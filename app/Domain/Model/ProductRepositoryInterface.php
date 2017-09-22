<?php

namespace app\Domain\Model;

/**
 * Class ProductRepositoryInterface.
 */
interface ProductRepositoryInterface
{
    /**
     * @param Category $category
     * @return Product[]
     */
    public function findByCategory(Category $category);

    /**
     * @param int $id
     *
     * @return Product|null
     */
    public function find($id);

    /**
     * Add, Update
     *
     * @param Product $product
     */
    public function save(Product $product);

    /**
     * Delete
     *
     * @param Product $product
     */
    public function delete(Product $product);
}
