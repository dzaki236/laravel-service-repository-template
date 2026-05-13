<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Gula Pasir',
                'kode' => 'BB001',
                'stok' => 50,
                'satuan' => 'kg',
                'harga' => 14000,
            ],
            [
                'nama' => 'Garam',
                'kode' => 'BB002',
                'stok' => 30,
                'satuan' => 'kg',
                'harga' => 8000,
            ],
            [
                'nama' => 'Tepung Terigu',
                'kode' => 'BB003',
                'stok' => 100,
                'satuan' => 'kg',
                'harga' => 12000,
            ],
            [
                'nama' => 'Minyak Goreng',
                'kode' => 'BB004',
                'stok' => 40,
                'satuan' => 'liter',
                'harga' => 18000,
            ],
            [
                'nama' => 'Beras',
                'kode' => 'BB005',
                'stok' => 200,
                'satuan' => 'kg',
                'harga' => 13000,
            ],
            [
                'nama' => 'Susu Bubuk',
                'kode' => 'BB006',
                'stok' => 25,
                'satuan' => 'kg',
                'harga' => 95000,
            ],
            [
                'nama' => 'Coklat Bubuk',
                'kode' => 'BB007',
                'stok' => 15,
                'satuan' => 'kg',
                'harga' => 60000,
            ],
            [
                'nama' => 'Kopi Bubuk',
                'kode' => 'BB008',
                'stok' => 35,
                'satuan' => 'kg',
                'harga' => 75000,
            ],
            [
                'nama' => 'Mentega',
                'kode' => 'BB009',
                'stok' => 20,
                'satuan' => 'kg',
                'harga' => 45000,
            ],
            [
                'nama' => 'Ragi',
                'kode' => 'BB010',
                'stok' => 10,
                'satuan' => 'gram',
                'harga' => 5000,
            ],
        ];

        DB::table('bahan_baku')->insert($data);
    }
}