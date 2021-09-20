<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $this->command->info('Seeding 50000 Products');
        $this->command->info('Seeding 2000 Pharmacies');
        $this->command->info('Note : this may take some a while');
        $this->command->info('You may stop the command at any time');
        $this->command->info('Start generating products and pharmacies please wait and read the info below');

        for ($i = 1; $i <= 2500; $i++) {

            $products = Product::factory(20)->create();
            $pharmacies = Pharmacy::factory(8)->create();

            $pharmacies->each(function ($pharmacy) use ($products, $faker) {
                $pharmacy->products()->attach(
                    $products->random(rand(1, 3))->pluck('id')->toArray(),
                    [
                        'price' => $faker->randomFloat(2, 10, 100),
                        'quantity' => $faker->numberBetween(1, 100)
                    ],
                );
            });

            $this->command->info(($i * 20) . ' products has been generated');
            $this->command->info(($i * 8) . ' pharmacies has been generated');
        }

        $this->command->info('Seeders has finished');
    }
}
