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
        $p1 = [
            'name' => 'Learn to build websites in HTML5',
            'image' => 'uploads/products/book.png',
            'price' => 5000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam condimentum et magna vitae iaculis. Aenean efficitur, nisi at rhoncus pulvinar, augue nunc pretium magna, eget mattis massa turpis id lacus. Pellentesque non eros quis nisi lobortis pulvinar. Donec et dui at mi eleifend tincidunt. Curabitur ultricies quam non justo varius.'
        ];

        $p2 = [
            'name' => 'PHP DEVELOMENT in depth',
            'image' => 'uploads/products/book.png',
            'price' => 2400,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam condimentum et magna vitae iaculis. Aenean efficitur, nisi at rhoncus pulvinar, augue nunc pretium magna, eget mattis massa turpis id lacus. Pellentesque non eros quis nisi lobortis pulvinar. Donec et dui at mi eleifend tincidunt. Curabitur ultricies quam non justo varius.'
        ];


        Product::create($p1);
        Product::create($p2);
    }
}
