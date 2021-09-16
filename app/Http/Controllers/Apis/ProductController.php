<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
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

    public function delete(Request $request)
    {
        return $this->makeResponse($this->productService->delete($request->all()));
    }
}
