<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DownloadProductImages extends Command
{
    protected $signature = 'products:seed-with-images';
    protected $description = 'Buat produk dummy dan download foto sesuai nama produk dari Pixabay';

    protected array $products = [
        // Kopi & Minuman Kekinian
        ['name' => 'Es Kopi Susu', 'price' => 18000, 'search' => 'iced coffee milk'],
        ['name' => 'Americano', 'price' => 15000, 'search' => 'americano coffee'],
        ['name' => 'Cappuccino', 'price' => 20000, 'search' => 'cappuccino'],
        ['name' => 'Matcha Latte', 'price' => 20000, 'search' => 'matcha latte'],
        ['name' => 'Caramel Macchiato', 'price' => 22000, 'search' => 'caramel macchiato'],
        ['name' => 'Kopi Susu Gula Aren', 'price' => 19000, 'search' => 'brown sugar coffee'],
        ['name' => 'Vanilla Latte', 'price' => 21000, 'search' => 'vanilla latte'],
        ['name' => 'Es Kopi Hitam', 'price' => 12000, 'search' => 'iced black coffee'],
        ['name' => 'Chocolate Frappe', 'price' => 23000, 'search' => 'chocolate frappe'],
        ['name' => 'Thai Tea', 'price' => 16000, 'search' => 'thai tea'],

        // Minuman Kemasan
        ['name' => 'Teh Botol Dingin', 'price' => 5000, 'search' => 'bottled iced tea'],
        ['name' => 'Aqua Botol 600ml', 'price' => 4000, 'search' => 'mineral water bottle'],
        ['name' => 'Susu Ultra Coklat', 'price' => 6000, 'search' => 'chocolate milk carton'],
        ['name' => 'Pocari Sweat', 'price' => 8000, 'search' => 'sports drink bottle'],
        ['name' => 'Coca Cola Kaleng', 'price' => 7000, 'search' => 'cola can'],
        ['name' => 'Fanta Kaleng', 'price' => 7000, 'search' => 'orange soda can'],
        ['name' => 'Sprite Botol', 'price' => 6500, 'search' => 'lemon soda bottle'],
        ['name' => 'Yakult 5 Pack', 'price' => 9000, 'search' => 'probiotic drink bottles'],

        // Makanan Instan
        ['name' => 'Indomie Goreng', 'price' => 3500, 'search' => 'instant fried noodles'],
        ['name' => 'Indomie Kuah Ayam Bawang', 'price' => 3500, 'search' => 'instant noodle soup'],
        ['name' => 'Pop Mie Ayam', 'price' => 6000, 'search' => 'cup noodles'],
        ['name' => 'Sarimi Goreng', 'price' => 3000, 'search' => 'fried instant noodles'],

        // Roti & Snack
        ['name' => 'Roti Tawar Sari Roti', 'price' => 15000, 'search' => 'white bread loaf'],
        ['name' => 'Croissant Coklat', 'price' => 17000, 'search' => 'chocolate croissant'],
        ['name' => 'Donat Gula', 'price' => 8000, 'search' => 'sugar donut'],
        ['name' => 'Chitato Sapi Panggang', 'price' => 12000, 'search' => 'potato chips bag'],
        ['name' => 'Lays Original', 'price' => 11000, 'search' => 'potato chips'],
        ['name' => 'Silverqueen Coklat', 'price' => 15000, 'search' => 'chocolate bar'],
        ['name' => 'Beng Beng', 'price' => 3000, 'search' => 'chocolate wafer bar'],
        ['name' => 'Oreo Original', 'price' => 9000, 'search' => 'oreo cookies'],
        ['name' => 'Chiki Balls', 'price' => 5000, 'search' => 'cheese balls snack'],

        // Makanan Berat
        ['name' => 'Nasi Goreng Kampung', 'price' => 20000, 'search' => 'fried rice'],
        ['name' => 'Sandwich Telur', 'price' => 15000, 'search' => 'egg sandwich'],
        ['name' => 'Sandwich Tuna', 'price' => 18000, 'search' => 'tuna sandwich'],
        ['name' => 'Nasi Uduk Komplit', 'price' => 17000, 'search' => 'coconut rice meal'],

        // Kebutuhan Harian
        ['name' => 'Tissue Paseo', 'price' => 8000, 'search' => 'tissue box'],
        ['name' => 'Sabun Mandi Lifebuoy', 'price' => 6000, 'search' => 'soap bar'],
        ['name' => 'Shampoo Sachet', 'price' => 1500, 'search' => 'shampoo sachet'],
        ['name' => 'Rokok Sampoerna Mild', 'price' => 32000, 'search' => 'cigarette pack'],
        ['name' => 'Korek Api Gas', 'price' => 5000, 'search' => 'lighter'],

        // Tambahan biar genap 50
        ['name' => 'Es Teh Manis', 'price' => 8000, 'search' => 'iced sweet tea'],
        ['name' => 'Es Jeruk Peras', 'price' => 10000, 'search' => 'fresh orange juice'],
        ['name' => 'Wafer Tango', 'price' => 4000, 'search' => 'wafer biscuit'],
        ['name' => 'Kacang Atom', 'price' => 6000, 'search' => 'fried peanuts snack'],
        ['name' => 'Permen Kopiko', 'price' => 2000, 'search' => 'coffee candy'],
        ['name' => 'Mie Sedaap Goreng', 'price' => 3500, 'search' => 'instant fried noodles'],
        ['name' => 'Telur Ayam per Kg', 'price' => 28000, 'search' => 'chicken eggs'],
        ['name' => 'Gula Pasir 1kg', 'price' => 16000, 'search' => 'sugar bag'],
        ['name' => 'Minyak Goreng 1L', 'price' => 19000, 'search' => 'cooking oil bottle'],
        ['name' => 'Beras 5kg', 'price' => 65000, 'search' => 'rice bag'],
    ];

    public function handle()
    {
        $apiKey = env('PIXABAY_API_KEY');

        if (!$apiKey) {
            $this->error('PIXABAY_API_KEY belum di-set di .env');
            return 1;
        }

        $folder = storage_path('app/public/products');
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $success = 0;
        $failed = 0;

        foreach ($this->products as $item) {
            // Skip kalau produk udah ada (aman dijalanin berkali-kali)
            if (Product::where('name', $item['name'])->exists()) {
                $this->line("Skip (sudah ada): {$item['name']}");
                continue;
            }

            $this->info("Downloading foto untuk: {$item['name']}...");

            $response = Http::get('https://pixabay.com/api/', [
                'key' => $apiKey,
                'q' => $item['search'],
                'image_type' => 'photo',
                'per_page' => 3,
                'safesearch' => 'true',
            ]);

            $imageUrl = $response->json('hits.0.webformatURL');

            if (!$imageUrl) {
                $this->warn("Gagal nemu gambar untuk {$item['name']}, pakai placeholder.");
                $failed++;
                continue;
            }

            $slug = Str::slug($item['name']);
            $filename = $slug . '.jpg';

            try {
                $imageContent = Http::timeout(15)->get($imageUrl)->body();
                file_put_contents($folder . '/' . $filename, $imageContent);
            } catch (\Exception $e) {
                $this->warn("Gagal download foto {$item['name']}: " . $e->getMessage());
                $failed++;
                continue;
            }

            Product::create([
                'category_id' => Category::inRandomOrder()->first()->id ?? 1,
                'name' => $item['name'],
                'photo' => $filename,
                'price' => $item['price'],
                'description' => "Produk {$item['name']} berkualitas terbaik.",
            ]);

            $this->info("✓ {$item['name']} berhasil dibuat + foto tersimpan: {$filename}");
            $success++;

            // Jeda dikit biar gak kena rate limit Pixabay
            usleep(300000); // 0.3 detik
        }

        $this->newLine();
        $this->info("Selesai! Berhasil: {$success}, Gagal: {$failed}");
        return 0;
    }
}