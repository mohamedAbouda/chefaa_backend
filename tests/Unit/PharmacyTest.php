<?php

namespace Tests\Unit;

use App\Models\Pharmacy;
use App\Repositories\PharmacyRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Phar;
use Tests\TestCase;

class PharmacyTest extends TestCase
{

    /** @test */
    public function it_can_create_a_pharmacy()
    {
        $data = [
            'name' => $this->generateRandomString(10),
            'address' => $this->generateRandomString(15),
        ];

        $pharmacyRepository = new PharmacyRepository();
        $pharmacy = $pharmacyRepository->create($data);

        $this->assertInstanceOf(Pharmacy::class, $pharmacy);
        $this->assertEquals($data['name'], $pharmacy->name);
        $this->assertEquals($data['address'], $pharmacy->address);
    }

    /** @test */
    public function it_can_show_a_pharmacy()
    {
        $pharmacy = Pharmacy::factory()->create();
        $pharmacyRepository = new PharmacyRepository();
        $found = $pharmacyRepository->getPhrmacy($pharmacy->id);

        $this->assertInstanceOf(Pharmacy::class, $found);
        $this->assertEquals($found->name, $pharmacy->name);
        $this->assertEquals($found->address, $pharmacy->address);
    }


    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
}
