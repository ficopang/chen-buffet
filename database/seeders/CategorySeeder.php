<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Beef',
            'Pork',
            'Chicken',
            'Vegetables',
            'Seafood',
            'Sweets',
        ];

        foreach ($categories as $c) {
            DB::table('categories')->insert([
                'name'=>$c
            ]);
        }
    }
}
