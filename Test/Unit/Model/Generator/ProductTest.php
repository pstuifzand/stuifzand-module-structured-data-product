<?php

namespace Stuifzand\StructuredDataProduct\Test\Unit\Model\Generator;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Product\Url;
use PHPUnit\Framework\TestCase;
use Stuifzand\StructuredDataProduct\Model\Generator\Product as ProductGenerator;

class ProductTest extends TestCase
{
    /**
     * @var \Stuifzand\StructuredDataProduct\Model\Generator\Product
     */
    private $generate;

    protected function setUp()
    {
        /** @var Url|\PHPUnit\Framework\MockObject\MockObject $urlModel */
        $urlModel = $this->createMock(Url::class);

        $this->generate = new ProductGenerator($urlModel);
    }

    public function testGenerate()
    {
        /** @var ProductInterface|\PHPUnit\Framework\MockObject\MockObject $product */
        $product = $this->createMock(ProductInterface::class);

        $product->method('getPrice')->willReturn(123);
        $product->method('getSku')->willReturn('SKU123');
        $product->method('getName')->willReturn('Productname');

        $data = $this->generate->generate($product);
        $this->assertEquals([
            '@context' => 'http://schema.org/',
            '@type'    => 'Product',
            'name'     => 'Productname',
            'sku'      => 'SKU123',
            'offers'   => [
                '@type'         => 'Offer',
                'url'           => null,
                'priceCurrency' => 'EUR',
                'price'         => 123,
                'itemCondition' => 'http://schema.org/NewCondition',
                'availability'  => 'http://schema.org/InStock',
            ],
        ], $data);
    }
}
