<?php

namespace app\Persistence\Memory;

use app\Domain\Model\Category;
use app\Domain\Model\Product;
use app\Domain\Model\ProductRepositoryInterface;

/**
 * Class ProductRepository.
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product[]
     */
    private $products = [];

    /**
     * ProductRepository constructor.
     * @param Product[] $products
     */
    public function __construct(array $products)
    {
        foreach ($products as $product) {
            $this->products[$product->getId()] = $product;
        }
    }

    /**
     * @param Category $category
     * @return array
     */
    public function findByCategory(Category $category)
    {
        $productsInCategory = [];

        foreach ($this->products as $product) {
            if (in_array($category, $product->getCategories(), true)) {
                $productsInCategory[] = $product;
            }
        }

        return $productsInCategory;
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function find($id)
    {
        if (!array_key_exists($id, $this->products)) {
            return null;
        }

        return $this->products[$id];
    }

    /**
     * @param Product $product
     */
    public function save(Product $product)
    {
        $this->products[$product->getId()] = $product;
    }

    /**
     * @param Product $product
     */
    public function delete(Product $product)
    {
        if (array_key_exists($product->getId(), $this->products)) {
            unset($this->products[$product->getId()]);
        }
    }
}
