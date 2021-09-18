<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\CreateProductRequest;
use App\Http\Requests\Apis\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index(Request $request)
    {
        $data = $request->all();
        return $this->makeResponse($this->productService->listProducts($data));
    }

    public function show($id)
    {
        return $this->makeResponse($this->productService->getProduct($id));
    }

    public function create(CreateProductRequest  $request)
    {
        return $this->makeResponse($this->productService->create($request->all()));

    }

    public function edit(UpdateProductRequest  $request)
    {
        return $this->makeResponse($this->productService->edit($request->all()));
    }

    public function delete(Request $request)
    {
        return $this->makeResponse($this->productService->delete($request->all()));
    }
}
