<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Denny Romes',
            'slug' => 'dennyromes',
            'details' => 'This product os good',
            'price' => 5000,
            'description' => 'This product is good and nice infromation provider and nice t handle',
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Rhone Romes',
            'slug' => 'rhoneromes',
            'details' => 'This product os good Dhrangdhra ',
            'price' => 500,
            'description' => 'This product is good and nice infromation provider and nice t handle',

        ])->categories()->attach(1);


        $product = Product::find(1);
        $product->categories()->attach(2);

        Product::create([
            'name' => 'Dhrangdhra Romes',
            'slug' => 'dhrangdhraromes',
            'details' => 'This product os good Rajkot',
            'price' => 5000,
            'description' => 'This product is good and nice infromation provider and nice t handle',

        ])->categories()->attach(2);
        Product::create([
            'name' => 'DRomes',
            'slug' => 'dromes',
            'details' => 'This product os good facade',
            'price' => 5000,
            'description' => 'This product is good and nice infromation provider and nice t handle',

        ])->categories()->attach(2);
        Product::create([
            'name' => 'DAR T-shirt',
            'slug' => 'dartshirt',
            'details' => 'This product os good Rajkot',
            'price' => 5000,
            'description' => 'This product is good and nice infromation provider and nice t handle',

        ])->categories()->attach(3);
        Product::create([
            'name' => 'Unibon T-shirt',
            'slug' => 'unibontshirt',
            'details' => 'This product os good Rajkot',
            'price' => 5000,
            'description' => 'This product is good and nice infromation provider and nice t handle',

        ])->categories()->attach(3);;
        Product::create([
            'name' => 'Romin Romes',
            'slug' => 'rominromes',
            'details' => 'This product os good Rajkot',
            'price' => 5000,
            'description' => 'This product is good and nice infromation provider and nice t handle',
        ])->categories()->attach(4);
        Product::create([
            'name' => 'Piyush Romes',
            'slug' => 'piyushromes',
            'details' => 'This product os good Rajkot',
            'price' => 450,
            'description' => 'This product is good and nice infromation provider and nice t handle',
        ])->categories()->attach(4);
        Product::create([
            'name' => 'Nish Romes',
            'slug' => 'nishromes',
            'details' => 'This product os good Rajkot',
            'price' => 45,
            'description' => 'This product is good and nice infromation provider and nice t handle',
        ])->categories()->attach(5);
        Product::create([
            'name' => 'Raj Romes',
            'slug' => 'rajromes',
            'details' => 'This product os good Rajkot',
            'price' => 5000,
            'description' => 'This product is good and nice infromation provider and nice t handle',
        ])->categories()->attach(5);
    }
}
