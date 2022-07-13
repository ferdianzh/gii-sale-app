<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 5; $i++) {
            Inventory::insert([
                'name' => $faker->city(),
                'price' => $faker->numberBetween($min = 1, $max = 99) * 100000,
                'stock' => $faker->numberBetween($min = 50, $max = 200),
            ]);
        }
    }
}
