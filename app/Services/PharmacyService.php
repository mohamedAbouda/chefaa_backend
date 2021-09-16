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
}
