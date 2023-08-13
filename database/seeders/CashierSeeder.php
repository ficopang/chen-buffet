<?php

namespace Database\Seeders;

use App\Models\Cashier;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0; $i < 3; $i++) {
            DB::table('cashiers')->insert([
                'name' => $faker->firstName
            ]);
        }
    }
}
