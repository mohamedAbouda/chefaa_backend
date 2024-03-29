<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Phar;

class PharmacyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pharmacy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->realText(15),
            'address'  => $this->faker->address(),
        ];
    }
}
