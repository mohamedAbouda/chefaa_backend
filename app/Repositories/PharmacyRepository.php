<?php

namespace App\Repositories;

use App\Models\Pharmacy;

class PharmacyRepository
{
    public function listPharmacies(array $data)
    {
        return Pharmacy::paginate($data['per_page'] ?? 10);
    }

    public function getPhrmacy(int $id)
    {
        return Pharmacy::findOrFail($id);
    }

    public function update(array $data)
    {
        return Pharmacy::where('id', $data['id'])->update([
            'name' => $data['name'],
            'address' => $data['address']
        ]);
    }

    public function create(array $data)
    {
        return Pharmacy::create($data);
    }

    public function delete(array $data)
    {
        return Pharmacy::where('id', $data['id'])->delete();
    }
}
