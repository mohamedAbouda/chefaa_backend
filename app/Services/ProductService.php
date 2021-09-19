<?php

namespace App\Services;


class ProductService {

    protected $productRepository;

    public function __construct($productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function listProducts(array $data)
    {
        return $this->productRepository->listProducts($data);
    }

    public function getProduct(int $id)
    {
        return $this->productRepository->getProduct($id);
    }

    public function delete(int $id)
    {
        return $this->productRepository->delete($id);
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

