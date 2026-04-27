<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class CoarseBackendSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'HP EliteBook 840 G6',
                'slug' => 'hp-elitebook-840-g6',
                'brand' => 'HP',
                'category' => 'Laptops',
                'sku' => 'HP-840-G6-001',
                'processor' => 'Intel Core i5',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'screen_size' => '14 inch',
                'ports' => 'USB-C, USB-A, HDMI, Ethernet',
                'operating_system' => 'Windows 11 Pro',
                'condition' => 'Refurbished',
                'retail_price' => 45000,
                'wholesale_price' => 41000,
                'stock' => 6,
                'low_stock_threshold' => 3,
                'meta_title' => 'HP EliteBook 840 G6 Kenya',
                'meta_description' => 'Business-grade HP EliteBook laptop for professionals in Kenya.',
                'is_active' => true,
            ],
            [
                'name' => 'Lenovo ThinkPad T480',
                'slug' => 'lenovo-thinkpad-t480',
                'brand' => 'Lenovo',
                'category' => 'Laptops',
                'sku' => 'LEN-T480-001',
                'processor' => 'Intel Core i7',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'screen_size' => '14 inch',
                'ports' => 'USB-C, USB-A, HDMI, Ethernet',
                'operating_system' => 'Windows 11 Pro',
                'condition' => 'Refurbished',
                'retail_price' => 52000,
                'wholesale_price' => 48000,
                'stock' => 2,
                'low_stock_threshold' => 3,
                'meta_title' => 'Lenovo ThinkPad T480 Kenya',
                'meta_description' => 'Reliable ThinkPad laptop with strong business performance.',
                'is_active' => true,
            ],
            [
                'name' => 'Business POS System Bundle',
                'slug' => 'business-pos-system-bundle',
                'brand' => 'Coarse Technologies',
                'category' => 'POS Systems',
                'sku' => 'POS-BUNDLE-001',
                'processor' => 'Intel Celeron/Core i3',
                'ram' => '8GB',
                'storage' => '256GB SSD',
                'screen_size' => '15 inch',
                'ports' => 'USB, LAN, HDMI',
                'operating_system' => 'Windows',
                'condition' => 'New',
                'retail_price' => 85000,
                'wholesale_price' => 78000,
                'stock' => 4,
                'low_stock_threshold' => 2,
                'meta_title' => 'POS System Bundle Kenya',
                'meta_description' => 'Complete POS hardware and software solution for Kenyan businesses.',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
