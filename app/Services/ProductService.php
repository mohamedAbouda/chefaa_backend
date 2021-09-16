<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService {

    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }
}

