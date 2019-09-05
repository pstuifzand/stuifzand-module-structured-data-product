<?php

namespace Stuifzand\StructuredDataProduct\Model\Generator;

use Stuifzand\StructuredDataApi\Api\Data\GeneratorInterface;

class Product implements GeneratorInterface
{
    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $object
     * @return array
     */
    public function generate($object): array
    {
        return [
            '@context' => 'http://schema.org/',
            '@type' => 'Product',
        ];
    }
}