<?php

namespace Stuifzand\StructuredDataProduct\Model\CurrentObject;

use Magento\Framework\Registry;
use Stuifzand\StructuredDataApi\Api\Data\CurrentObjectInterface;

class Product implements CurrentObjectInterface
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $registry;

    /**
     * Product constructor.
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Registry $registry
    ) {
        $this->registry = $registry;
    }

    /**
     * @return \Magento\Catalog\Api\Data\ProductInterface
     */
    public function getCurrentObject()
    {
        return $this->registry->registry('current_product');
    }
}
