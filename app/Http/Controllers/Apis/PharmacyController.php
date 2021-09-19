<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\CreatePharmacyRequest;
use App\Http\Requests\Apis\DeletePharmacyRequest;
use App\Http\Requests\Apis\UpdatePharmacyRequest;
use App\Repositories\PharmacyRepository;
use App\Services\PharmacyService;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    protected $pharmacyService;

    public function __construct()
    {
        $this->pharmacyService = new PharmacyService(new PharmacyRepository());
    }

    public function index(Request $request)
    {
        $data = $request->all();
        return $this->makeResponse($this->pharmacyService->listPharmacies($data));
    }

    public function show($id)
    {
        return $this->makeResponse($this->pharmacyService->getPhrmacy($id));
    }

    public function create(CreatePharmacyRequest $request)
    {
        return $this->makeResponse($this->pharmacyService->create($request->all()));
    }

    public function edit(UpdatePharmacyRequest $request)
    {
        return $this->makeResponse($this->pharmacyService->update($request->all()));
    }

    public function delete(DeletePharmacyRequest $request)
    {
        return $this->makeResponse($this->pharmacyService->delete($request->input('id')));
    }
}
