<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            // Kopi & Minuman Kekinian (10)
            ['name' => 'Es Kopi Susu', 'price' => 18000],
            ['name' => 'Americano', 'price' => 15000],
            ['name' => 'Cappuccino', 'price' => 20000],
            ['name' => 'Matcha Latte', 'price' => 20000],
            ['name' => 'Caramel Macchiato', 'price' => 22000],
            ['name' => 'Kopi Susu Gula Aren', 'price' => 19000],
            ['name' => 'Vanilla Latte', 'price' => 21000],
            ['name' => 'Es Kopi Hitam', 'price' => 12000],
            ['name' => 'Chocolate Frappe', 'price' => 23000],
            ['name' => 'Thai Tea', 'price' => 16000],

            // Minuman Kemasan (8)
            ['name' => 'Teh Botol Dingin', 'price' => 5000],
            ['name' => 'Aqua Botol 600ml', 'price' => 4000],
            ['name' => 'Susu Ultra Coklat', 'price' => 6000],
            ['name' => 'Pocari Sweat', 'price' => 8000],
            ['name' => 'Coca Cola Kaleng', 'price' => 7000],
            ['name' => 'Fanta Kaleng', 'price' => 7000],
            ['name' => 'Sprite Botol', 'price' => 6500],
            ['name' => 'Yakult 5 Pack', 'price' => 9000],

            // Makanan Instan (4)
            ['name' => 'Indomie Goreng', 'price' => 3500],
            ['name' => 'Indomie Kuah Ayam Bawang', 'price' => 3500],
            ['name' => 'Pop Mie Ayam', 'price' => 6000],
            ['name' => 'Sarimi Goreng', 'price' => 3000],

            // Roti & Snack (9)
            ['name' => 'Roti Tawar Sari Roti', 'price' => 15000],
            ['name' => 'Croissant Coklat', 'price' => 17000],
            ['name' => 'Donat Gula', 'price' => 8000],
            ['name' => 'Chitato Sapi Panggang', 'price' => 12000],
            ['name' => 'Lays Original', 'price' => 11000],
            ['name' => 'Silverqueen Coklat', 'price' => 15000],
            ['name' => 'Beng Beng', 'price' => 3000],
            ['name' => 'Oreo Original', 'price' => 9000],
            ['name' => 'Chiki Balls', 'price' => 5000],

            // Makanan Berat (4)
            ['name' => 'Nasi Goreng Kampung', 'price' => 20000],
            ['name' => 'Sandwich Telur', 'price' => 15000],
            ['name' => 'Sandwich Tuna', 'price' => 18000],
            ['name' => 'Nasi Uduk Komplit', 'price' => 17000],

            // Kebutuhan Harian (5)
            ['name' => 'Tissue Paseo', 'price' => 8000],
            ['name' => 'Sabun Mandi Lifebuoy', 'price' => 6000],
            ['name' => 'Shampoo Sachet', 'price' => 1500],
            ['name' => 'Rokok Sampoerna Mild', 'price' => 32000],
            ['name' => 'Korek Api Gas', 'price' => 5000],

            // Tambahan biar genap 50 (10)
            ['name' => 'Es Teh Manis', 'price' => 8000],
            ['name' => 'Es Jeruk Peras', 'price' => 10000],
            ['name' => 'Wafer Tango', 'price' => 4000],
            ['name' => 'Kacang Atom', 'price' => 6000],
            ['name' => 'Permen Kopiko', 'price' => 2000],
            ['name' => 'Mie Sedaap Goreng', 'price' => 3500],
            ['name' => 'Telur Ayam per Kg', 'price' => 28000],
            ['name' => 'Gula Pasir 1kg', 'price' => 16000],
            ['name' => 'Minyak Goreng 1L', 'price' => 19000],
            ['name' => 'Beras 5kg', 'price' => 65000],
        ];

        $item = fake()->unique()->randomElement($products);

        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'name'        => $item['name'],
            'photo'       => 'default.jpg',
            'price'       => $item['price'],
            'description' => fake()->sentence(8),
        ];
    }
}