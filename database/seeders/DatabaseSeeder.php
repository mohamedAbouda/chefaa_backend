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
        $this->command->info('Generating 1 user');
        $this->command->info('Email : chefaa@mail.com');
        $this->command->info('Password : password');
        $this->command->info('___________________________');
        $this->command->info('Seeding 50000 Products');
        $this->command->info('Seeding 2000 Pharmacies');
        $this->command->info('Note : this may take some while');
        $this->command->info('You may stop the command at any time');
        $this->command->info('Start generating products and pharmacies please wait and read info below');
        for($i = 1; $i <= 2500 ; $i++){

            Product::factory(20)->create();
            Pharmacy::factory(8)->create();

            $this->command->info(($i * 20) . ' products has been generated');
            $this->command->info(($i * 8) . ' pharmacies has been generated');
        }
        $this->command->info('Seeders has finished');
    }
}
