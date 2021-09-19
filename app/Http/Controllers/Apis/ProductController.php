<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\CreateProductRequest;
use App\Http\Requests\Apis\DeleteProductRequest;
use App\Http\Requests\Apis\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct()
    {
        $this->productService = new ProductService(new ProductRepository());
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

    public function delete(DeleteProductRequest $request)
    {
        return $this->makeResponse($this->productService->delete($request->input('id')));
    }
}
