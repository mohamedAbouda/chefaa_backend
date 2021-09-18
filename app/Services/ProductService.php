<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService {

    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function listProducts(array $data)
    {
        return $this->productRepository->listProducts($data);
    }

    public function getProduct(int $id)
    {
        return $this->productRepository->getProduct($id);
    }

    public function delete(array $data)
    {
        return $this->productRepository->delete($data);
    }

    public function create(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function edit(array $data)
    {
        return $this->productRepository->update($data);
    }
}

