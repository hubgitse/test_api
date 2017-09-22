<?php

namespace app\Domain\Model;

/**
 * Class Category.
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Product[]
     */
    private $products = [];

    /**
     * Category constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct($id, $name)
    {
        $this->id = (int) $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        if (!$product->getId()) {
            throw new \RuntimeException('Cannot add not saved product');
        }

        $this->products[$product->getId()] = $product;

        $product->addCategory($this);
    }
}
