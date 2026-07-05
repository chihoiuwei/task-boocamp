<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama_produk' => 'Syltherine Chair',
                'harga' => 2500000,
                'kategori' => 'chair',
                'image' => 'Images.png',
            ],
            [
                'nama_produk' => 'Leviosa Sofa',
                'harga' => 7000000,
                'kategori' => 'sofa',
                'image' => 'Images (1).png',
            ],
            [
                'nama_produk' => 'Lolito Table',
                'harga' => 4500000,
                'kategori' => 'table',
                'image' => 'Images (2).png',
            ],
            [
                'nama_produk' => 'Respira Lamp',
                'harga' => 1500000,
                'kategori' => 'lamp',
                'image' => 'Images (3).png',
            ],
            [
                'nama_produk' => 'Grifo Chair',
                'harga' => 3500000,
                'kategori' => 'chair',
                'image' => 'produk-1.png',
            ],
            [
                'nama_produk' => 'Muggo Sofa',
                'harga' => 8500000,
                'kategori' => 'sofa',
                'image' => 'produk-2.png',
            ],
            [
                'nama_produk' => 'Pingky Table',
                'harga' => 5000000,
                'kategori' => 'table',
                'image' => 'produk-3.png',
            ],
            [
                'nama_produk' => 'Potty Lamp',
                'harga' => 1200000,
                'kategori' => 'lamp',
                'image' => 'produk-4.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
