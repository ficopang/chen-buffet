<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                'name'=>'Beef with Broccoli',
                'category'=>1,
                'price'=>45000,
                'image'=>'beef-with-broccoli.jpg'
            ],
            [
                'name'=>'Sliced Pork',
                'category'=>2,
                'price'=>50000,
                'image'=>'sliced-pork.jpg'
            ],
            [
                'name'=>'Spicy Chicken Stew',
                'category'=>3,
                'price'=>40000,
                'image'=>'spicy-chicken-stew.jpg'
            ],
            [
                'name'=>'Garlic Fried Green Beans',
                'category'=>4,
                'price'=>35000,
                'image'=>'garlic-fried-green-beans.jpg'
            ],
            [
                'name'=>'Shrimp with Special Sauce',
                'category'=>5,
                'price'=>35000,
                'image'=>'shrimp-with-special-sauce.jpg'
            ],
            [
                'name'=>'Sugar Donut',
                'category'=>6,
                'price'=>15000,
                'image'=>'sugar-donut.jpg'
            ],
        ];

        foreach ($foods as $f) {
            DB::table('foods')->insert([
                'image'=>$f['image'],
                'name' =>  $f['name'],
                'price' => $f['price'],
                'category_id' => $f['category'],
            ]);
        }
    }
}
