<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//Models
use Modules\Product\Entities\Product;

class SeedFakeProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $products = ['Tomate','Cebolla','Pimenton','Lechuga','Zanahoria','Melon','Sandia','Banana'];

        foreach ($products as $product) {
            Product::create([
                'name' => $product,
                'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque',
                'price' => rand(0, 50) / 10,
                'img' => 'fruits/'.strtolower($product).'.jpg'
            ]);
        }

        return 1;
    }
}
