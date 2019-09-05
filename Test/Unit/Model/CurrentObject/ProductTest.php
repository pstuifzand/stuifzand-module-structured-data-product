<?php

namespace Stuifzand\StructuredDataProduct\Test\Unit\Model\CurrentObject;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Registry;
use PHPUnit\Framework\TestCase;
use Stuifzand\StructuredDataProduct\Model\CurrentObject\Product;

class ProductTest extends TestCase
{
    /**
     * @var \Stuifzand\StructuredDataProduct\Model\CurrentObject\Product
     */
    private $product;

    /** @var Registry|\PHPUnit\Framework\MockObject\MockObject */
    private $registry;

    protected function setUp()
    {
        /** @var Registry|\PHPUnit\Framework\MockObject\MockObject $registry */
        $this->registry = $this->createMock(Registry::class);
        $this->product = new Product($this->registry);
    }

    public function testNothing()
    {
        $this->assertTrue(true);
    }

    public function testCurrentObject()
    {
        $product = $this->createMock(ProductInterface::class);
        $this->registry->method('registry')->willReturn($product);
        $this->assertEquals($product, $this->product->getCurrentObject());
    }
}
