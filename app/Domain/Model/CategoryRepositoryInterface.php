<?php

namespace app\Domain\Model;

/**
 * Interface CategoryRepositoryInterface.
 */
interface CategoryRepositoryInterface
{
    /**
     * @return Category[]
     */
    public function findAll();

    /**
     * @param int $id
     *
     * @return Category|null
     */
    public function find($id);

    /**
     * Add, Update
     *
     * @param Category $category
     */
    public function save(Category $category);

    /**
     * Delete
     *
     * @param Category $category
     */
    public function delete(Category $category);
}