<?php

namespace app\Persistence\Memory;

use app\Domain\Model\Category;
use app\Domain\Model\CategoryRepositoryInterface;

/**
 * Class CategoryRepository.
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category[]
     */
    private $categories = [];

    /**
     * CategoryRepository constructor.
     * @param Category[] $categories
     */
    public function __construct(array $categories)
    {
        foreach ($categories as $category) {
            $this->categories[$category->getId()] = $category;
        }
    }

    /**
     * @return Category[]
     */
    public function findAll()
    {
        return $this->categories;
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function find($id)
    {
        if (!array_key_exists($id, $this->categories)) {
            return null;
        }

        return $this->categories[$id];
    }

    /**
     * @param Category $category
     */
    public function save(Category $category)
    {
        $this->categories[$category->getId()] = $category;
    }

    /**
     * @param Category $category
     */
    public function delete(Category $category)
    {
        if (array_key_exists($category->getId(), $this->categories)) {
            unset($this->categories[$category->getId()]);
        }
    }
}