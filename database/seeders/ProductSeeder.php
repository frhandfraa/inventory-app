<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop Gaming', 'category' => 'Elektronik', 'price' => 1485000, 'stock' => 24],
            ['name' => 'Headphone Wireless', 'category' => 'Elektronik', 'price' => 275000, 'stock' => 42],
            ['name' => 'Monitor LED 24"', 'category' => 'Elektronik', 'price' => 675000, 'stock' => 18],
            ['name' => 'Printer Inkjet', 'category' => 'Elektronik', 'price' => 820000, 'stock' => 12],
            ['name' => 'Speaker Bluetooth', 'category' => 'Elektronik', 'price' => 395000, 'stock' => 31],
            ['name' => 'Power Bank 10000mAh', 'category' => 'Elektronik', 'price' => 185000, 'stock' => 77],
            ['name' => 'Kamera Digital', 'category' => 'Elektronik', 'price' => 1280000, 'stock' => 9],
            ['name' => 'Kulkas Mini', 'category' => 'Elektronik', 'price' => 920000, 'stock' => 6],
            ['name' => 'Blender Dapur', 'category' => 'Elektronik', 'price' => 264000, 'stock' => 29],
            ['name' => 'TV LED 32"', 'category' => 'Elektronik', 'price' => 2145000, 'stock' => 8],
            ['name' => 'Router WiFi', 'category' => 'Elektronik', 'price' => 315000, 'stock' => 35],
            ['name' => 'Flash Disk 64GB', 'category' => 'Elektronik', 'price' => 99000, 'stock' => 101],
            ['name' => 'Charger USB', 'category' => 'Elektronik', 'price' => 45000, 'stock' => 92],
            ['name' => 'Speaker Soundbar', 'category' => 'Elektronik', 'price' => 650000, 'stock' => 14],
            ['name' => 'Kaos Polos', 'category' => 'Fashion', 'price' => 75000, 'stock' => 64],
            ['name' => 'Celana Jeans', 'category' => 'Fashion', 'price' => 155000, 'stock' => 28],
            ['name' => 'Sepatu Sneakers', 'category' => 'Fashion', 'price' => 295000, 'stock' => 20],
            ['name' => 'Topi Baseball', 'category' => 'Fashion', 'price' => 65000, 'stock' => 56],
            ['name' => 'Jaket Hoodie', 'category' => 'Fashion', 'price' => 195000, 'stock' => 33],
            ['name' => 'Tas Selempang', 'category' => 'Fashion', 'price' => 129000, 'stock' => 47],
            ['name' => 'Kemeja Lengan Panjang', 'category' => 'Fashion', 'price' => 132000, 'stock' => 19],
            ['name' => 'Rok Mini', 'category' => 'Fashion', 'price' => 108000, 'stock' => 22],
            ['name' => 'Sandal Kulit', 'category' => 'Fashion', 'price' => 89000, 'stock' => 39],
            ['name' => 'Jam Tangan Kasual', 'category' => 'Fashion', 'price' => 230000, 'stock' => 15],
            ['name' => 'Dompet Pria', 'category' => 'Fashion', 'price' => 72000, 'stock' => 51],
            ['name' => 'Dress Santai', 'category' => 'Fashion', 'price' => 175000, 'stock' => 18],
            ['name' => 'Roti Tawar', 'category' => 'Makanan', 'price' => 27000, 'stock' => 120],
            ['name' => 'Cokelat Batang', 'category' => 'Makanan', 'price' => 22000, 'stock' => 94],
            ['name' => 'Kopi Instan', 'category' => 'Makanan', 'price' => 32000, 'stock' => 70],
            ['name' => 'Gula Pasir', 'category' => 'Makanan', 'price' => 26000, 'stock' => 80],
            ['name' => 'Minyak Goreng', 'category' => 'Makanan', 'price' => 34000, 'stock' => 67],
            ['name' => 'Susu UHT', 'category' => 'Makanan', 'price' => 18000, 'stock' => 95],
            ['name' => 'Beras Premium', 'category' => 'Makanan', 'price' => 92000, 'stock' => 40],
            ['name' => 'Teh Celup', 'category' => 'Makanan', 'price' => 22000, 'stock' => 76],
            ['name' => 'Mi Instan', 'category' => 'Makanan', 'price' => 5500, 'stock' => 140],
            ['name' => 'Kacang Goreng', 'category' => 'Makanan', 'price' => 16000, 'stock' => 82],
            ['name' => 'Permen Mint', 'category' => 'Makanan', 'price' => 9000, 'stock' => 130],
            ['name' => 'Yoghurt Botol', 'category' => 'Makanan', 'price' => 21000, 'stock' => 58],
            ['name' => 'Pensil Mekanik', 'category' => 'Alat Tulis', 'price' => 22000, 'stock' => 88],
            ['name' => 'Pulpen Hitam', 'category' => 'Alat Tulis', 'price' => 14000, 'stock' => 105],
            ['name' => 'Buku Tulis 100 Halaman', 'category' => 'Alat Tulis', 'price' => 19000, 'stock' => 61],
            ['name' => 'Spidol Warna', 'category' => 'Alat Tulis', 'price' => 30000, 'stock' => 47],
            ['name' => 'Penggaris 30cm', 'category' => 'Alat Tulis', 'price' => 12000, 'stock' => 82],
            ['name' => 'Sticky Notes', 'category' => 'Alat Tulis', 'price' => 17000, 'stock' => 74],
            ['name' => 'Kertas HVS A4', 'category' => 'Alat Tulis', 'price' => 42000, 'stock' => 38],
            ['name' => 'Penghapus Karet', 'category' => 'Alat Tulis', 'price' => 7000, 'stock' => 115],
            ['name' => 'Sharpeners', 'category' => 'Alat Tulis', 'price' => 9000, 'stock' => 97],
            ['name' => 'Buku Gambar', 'category' => 'Alat Tulis', 'price' => 26000, 'stock' => 53],
            ['name' => 'Stapler Mini', 'category' => 'Alat Tulis', 'price' => 31000, 'stock' => 29],
            ['name' => 'Kalkulator Saku', 'category' => 'Alat Tulis', 'price' => 84000, 'stock' => 22],
        ];

        foreach ($products as $product) {
            $category = Category::firstWhere('name', $product['category']);

            if (! $category) {
                continue;
            }

            Product::create([
                'category_id' => $category->id,
                'name' => $product['name'],
                'description' => 'Deskripsi untuk ' . $product['name'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'status' => 'tersedia',
            ]);
        }
    }
}
