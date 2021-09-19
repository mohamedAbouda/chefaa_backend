<?php

namespace App\Services;

class PharmacyService
{

    protected $pharmacyRepository;

    public function __construct($pharmacyRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
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

    public function delete(int $id)
    {
        return $this->pharmacyRepository->delete($id);
    }
}
