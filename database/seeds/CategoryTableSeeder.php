<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Women', 'slug' => 'women', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Men', 'slug' => 'men', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kids', 'slug' => 'Kids', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Accessories', 'slug' => 'accessories', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cosmetics', 'slug' => 'cosmetics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Digital Cameras', 'slug' => 'digital-cameras', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Appliances', 'slug' => 'appliances', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
