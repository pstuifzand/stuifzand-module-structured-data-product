<?php

namespace Stuifzand\StructuredDataProduct\Test\Unit\Model\Generator;

use Magento\Catalog\Api\Data\ProductInterface;
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
        $this->generate = new ProductGenerator();
    }

    public function testGenerate()
    {
        /** @var ProductInterface|\PHPUnit\Framework\MockObject\MockObject $product */
        $product = $this->createMock(ProductInterface::class);
        $data    = $this->generate->generate($product);
        $this->assertEquals([
            '@context' => 'http://schema.org/',
            '@type'    => 'Product',
        ], $data);
    }
}
