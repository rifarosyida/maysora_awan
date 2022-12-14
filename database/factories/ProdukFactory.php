<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kategori = Kategori::factory()->create();
        $supplier = Supplier::factory()->create();
        return [
            'nama_produk' => $this->faker->word(),
            'foto_produk' => $this->faker->word(),
            'harga' => 9000,
            'stok' => 5,
            'diskon' => 0,
            'deskripsi' => $this->faker->text(),
            'kategori_id' => $kategori->id,
            'supplier_id' => $supplier->id,
        ];
    }
}
