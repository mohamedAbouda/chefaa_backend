<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function listProducts($data)
    {
        return Product::when(!empty($data['search_query']),function($query) use ($data) {
            $query->where('title', 'like', '%'.$data['search_query'].'%');
        })->paginate($data['per_page'] ?? 10);
    }

    public function getProduct($id)
    {
        return Product::where('id', $id)->with('pharmacies',function($query){
            $query->select('id','name');
        })->first();
    }

    public function delete(array $data)
    {
        return Product::where('id', $data['id'])->delete();
    }
}
