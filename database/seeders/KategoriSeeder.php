<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'SC',
                'keterangan' => 'Skincare',
            ],
            [
                'nama_kategori' => 'FW',
                'keterangan' => 'Fashion Wanita',
            ],
            [
                'nama_kategori' => 'KH',
                'keterangan' => 'Kesehatan',
            ],
            [
                'nama_kategori' => 'SP',
                'keterangan' => 'Souvenir dan Pesta',
            ]
            ]);  
    }
}
