<?php

namespace app\Domain\Model;

/**
 * Class Product.
 */
class Product
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
     * @var int 20.50 -> 2050
     */
    private $price;

    /**
     * @var Category[]
     */
    private $categories = [];

    /**
     * Product constructor.
     * @param int $id
     * @param string $name
     * @param int $price
     */
    public function __construct($id, $name, $price)
    {
        $this->id = (int) $id;
        $this->name = $name;
        $this->price = (int) $price;
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
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getDisplayPrice()
    {
        return number_format($this->price, 2, '.');
    }

    /**
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        if (!$category->getId()) {
            throw new \RuntimeException('Cannot add not saved category');
        }

        $this->categories[$category->getId()] = $category;

        $category->addProduct($this);
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }
}