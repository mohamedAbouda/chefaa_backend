<?php

namespace App\Repositories;

use App\Models\Pharmacy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PharmacyRepository
{
    public function listPharmacies(array $data) :LengthAwarePaginator
    {
        return Pharmacy::paginate($data['per_page'] ?? 10);
    }

    public function getPhrmacy(int $id) : ?Pharmacy
    {
        return Pharmacy::find($id);
    }

    public function update(array $data) : int
    {
        return Pharmacy::where('id', $data['id'])->update([
            'name' => $data['name'],
            'address' => $data['address']
        ]);
    }

    public function create(array $data) :Pharmacy
    {
        return Pharmacy::create($data);
    }

    public function delete(array $data) :int
    {
        return Pharmacy::where('id', $data['id'])->delete();
    }
}
