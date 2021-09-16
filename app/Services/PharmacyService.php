<?php

namespace App\Services;

use App\Repositories\PharmacyRepository;

class PharmacyService
{

    protected $pharmacyRepository;

    public function __construct()
    {
        $this->pharmacyRepository = new PharmacyRepository();
    }

    public function listPharmacies(array $data)
    {
        return $this->pharmacyRepository->listPharmacies($data);
    }

    public function getPhrmacy(int $id)
    {
        return $this->pharmacyRepository->getPhrmacy($id);
    }

    public function update(array $data)
    {
        return $this->pharmacyRepository->update($data);
    }

    public function create(array $data)
    {
        return $this->pharmacyRepository->create($data);
    }

    public function delete(array $data)
    {
        return $this->pharmacyRepository->delete($data);
    }
}
