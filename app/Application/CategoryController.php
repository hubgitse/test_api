<?php

namespace app\Application;

use app\Domain\Model\CategoryRepositoryInterface;

/**
 * Class CategoryController.
 */
class CategoryController extends AbstractController
{
    public function getAllCategoriesAction()
    {
        /** @var CategoryRepositoryInterface $categoryRepository */
        $categoryRepository = $this->serviceLocator->get('category.repository');

        $categories = $categoryRepository->findAll();

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->getId(),
                'name' => $category->getName(),
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}