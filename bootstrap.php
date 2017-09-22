<?php

require 'autoloader.php';

$config = require 'app/config/config.php';

$serviceLocator = new \app\Service\ServiceLocator();

// Add in memory entities.
$productRepository = new \app\Persistence\Memory\ProductRepository([
   new \app\Domain\Model\Product(1, 'iPad', 2000),
   new \app\Domain\Model\Product(2, 'MacBook', 5000),
]);

$categoryRepository = new \app\Persistence\Memory\CategoryRepository([
    new \app\Domain\Model\Category(1, 'Tablet'),
    new \app\Domain\Model\Category(2, 'Laptop'),
]);

$tabletCategory = $categoryRepository->find(1);
$laptopCategory = $categoryRepository->find(2);
$iPad = $productRepository->find(1);
$macBook = $productRepository->find(2);

$iPad->addCategory($tabletCategory);
$macBook->addCategory($laptopCategory);

$serviceLocator->set('product.repository', $productRepository);
$serviceLocator->set('category.repository', $categoryRepository);
