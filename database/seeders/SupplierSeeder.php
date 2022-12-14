<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert(
            [
                [
                    'nama_supplier' => 'AVOSKIN',
                    'deskripsi' => 'Avoskin merupakan merek produk kecantikan di bawah naungan PT AVO Innovation & Technology.',
                    'gambar' => 'images/gambar/supplier/sp-1.png'
                ],
                [
                    'nama_supplier' => 'Camille',
                    'deskripsi' => 'Camille sendiri merupakan merk dagang produk kecantikan milik Nadya Shavira yang baik unuk kulit',
                    'gambar' => 'images/gambar/supplier/2.png'
                ],
                // [
                //     'nama_supplier' => 'Emina',
                //     'deskripsi' => ' Emina adalah sebuah brand kosmetika yang kulit remaja dan wanita muda oleh Paragon Group.',
                //     'gambar' => 'images/gambar/supplier/3.png'
                // ],
                // [
                //     'nama_supplier' => 'Facetology',
                //     'deskripsi' => 'Facetology adalah sunscreen dengan tekstur paling ringan di kulit kering yang direkomendasikan.',
                //     'gambar' => 'images/gambar/supplier/4.png'
                // ],
                // [
                //     'nama_supplier' => 'Golden Viera',
                //     'deskripsi' => 'Golden Viera, brand lokal perawatan dengan kandungan herbal dalam produknya sehingga aman.',
                //     'gambar' => 'images/gambar/supplier/5.png'
                // ],
                // [
                //     'nama_supplier' => 'Hadalabo',
                //     'deskripsi' => 'merek perawatan kulit nomor satu di Jepang yang menawarkan produk dengan mengandung hyaluronic acid.',
                //     'gambar' => 'images/gambar/supplier/6.png'
                // ],
                // [
                //     'nama_supplier' => 'Madame Gie',
                //     'deskripsi' => 'Madame Gie merupakan produk kecantikan yang kosmetik terbaik untuk semua kalangan milik Gisella.',
                //     'gambar' => 'images/gambar/supplier/7.png'
                // ],
                // [
                //     'nama_supplier' => 'Noera',
                //     'deskripsi' => 'Noera adalah produk kecantikan yang didirikan oleh reisha official yang baik mengandung collagen',
                //     'gambar' => 'images/gambar/supplier/8.png'
                // ],
                // [
                //     'nama_supplier' => 'NPURE',
                //     'deskripsi' => 'NPURE merupakan brand skincare lokal mengutamakan penggunaan bahan baku utama alami.',
                //     'gambar' => 'images/gambar/supplier/9.png'
                // ],
                // [
                //     'nama_supplier' => 'Scarlett',
                //     'deskripsi' => 'Scarlett Whitening adalah brand lokal milik artis yang berfokus pada produk pencerah kulit wanita Indonesia.',
                //     'gambar' => 'images/gambar/supplier/10.png'
                // ],
                // [
                //     'nama_supplier' => 'SKINTIFIC',
                //     'deskripsi' => 'Skintific adalah brand asal Canada yang mengutamakan kesehatan serta kekuatan skin barrier.',
                //     'gambar' => 'images/gambar/supplier/11.png'
                // ],
                // [
                //     'nama_supplier' => 'Azarine',
                //     'deskripsi' => 'Azarine Cosmetic merupakan produk skincare dengan bahan alami dan herbal yang telah bersertifikat.',
                //     'gambar' => 'images/gambar/supplier/12.png'
                // ],
                // [
                //     'nama_supplier' => 'Maysora.co',
                //     'deskripsi' => 'Maysora.co adalah toko serta supplier produk kecantikan dan fashion wanita yang terletak di Bojonegoro ',
                //     'gambar' => 'images/gambar/supplier/13.png'
                // ],
            ]
        );
    }
}
