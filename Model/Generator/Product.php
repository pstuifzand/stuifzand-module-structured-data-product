<?php

namespace Stuifzand\StructuredDataProduct\Model\Generator;

use Stuifzand\StructuredDataApi\Api\Data\GeneratorInterface;

class Product implements GeneratorInterface
{
    /**
     * @var \Magento\Catalog\Model\Product\Url
     */
    private $urlModel;

    /**
     * Product constructor.
     * @param \Magento\Catalog\Model\Product\Url $urlModel
     */
    public function __construct(
        \Magento\Catalog\Model\Product\Url $urlModel
    ) {
        $this->urlModel = $urlModel;
    }

    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $object
     * @return array
     */
    public function generate($object): array
    {
        return [
            '@context' => 'http://schema.org/',
            '@type'    => 'Product',
            'name'     => $object->getName(),
            'sku'      => $object->getSku(),
            'offers'   => [
                '@type'         => 'Offer',
                'url'           => $this->urlModel->getProductUrl($object),
                'priceCurrency' => 'EUR',
                'price'         => $object->getPrice(),
                'itemCondition' => 'http://schema.org/NewCondition',
                'availability'  => 'http://schema.org/InStock',
            ],
        ];
    }
}
