<?php

namespace Tests\Unit;

use App\Models\Pharmacy;
use App\Repositories\PharmacyRepository;
use App\Services\PharmacyService;
use Tests\TestCase;

class PharmacyTest extends TestCase
{
    protected $pharmacyService;
    protected $faker;

    public function setUp() :void
    {
        parent::setUp();

        $this->faker = \Faker\Factory::create();
        $this->pharmacyService = new PharmacyService(new PharmacyRepository());
    }

    /** @test */
    public function it_can_create_a_pharmacy()
    {
        $data = [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
        ];

        $pharmacy = $this->pharmacyService->create($data);

        $this->assertInstanceOf(Pharmacy::class, $pharmacy);
        $this->assertEquals($data['name'], $pharmacy->name);
        $this->assertEquals($data['address'], $pharmacy->address);
    }

    /** @test */
    public function it_can_update_a_pharmacy()
    {
        $data = [
            'id'  => Pharmacy::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'address' => $this->faker->address,
        ];

        $pharmacy = $this->pharmacyService->update($data);

        $this->assertEquals($pharmacy, true);
    }

    /** @test */
    public function it_can_show_a_pharmacy()
    {
        $pharmacy = Pharmacy::factory()->create();
        $found = $this->pharmacyService->getPhrmacy($pharmacy->id);

        $this->assertInstanceOf(Pharmacy::class, $found);
        $this->assertEquals($found->name, $pharmacy->name);
        $this->assertEquals($found->address, $pharmacy->address);
    }

    /** @test */
    public function it_can_destroy_a_pharmacy()
    {
        $pharmacy = Pharmacy::factory()->create();
        $delete = $this->pharmacyService->delete($pharmacy->id);

        $this->assertEquals($delete, true);
    }
}
