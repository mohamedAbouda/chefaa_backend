<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function listProducts($data) :LengthAwarePaginator
    {
        return Product::when(!empty($data['search_query']),function($query) use ($data) {
            $query->where('title', 'like', '%'.$data['search_query'].'%');
        })->paginate($data['per_page'] ?? 10);
    }

    public function getProduct($id) : ?Product
    {
        return Product::where('id', $id)->with('pharmacies',function($query){
            $query->select('id','name');
        })->first();
    }

    public function delete(array $data) :int
    {
        return Product::where('id', $data['id'])->delete();
    }

    public function create(array $data) :Product
    {
        return Product::create($data);
    }

    public function update(array $data) :int
    {
        $product = Product::find($data['id']);
        $product->fill($data);
        return $product->save();
    }
}
