<?php

namespace Tests\Feature;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdukUpdateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_produk_by_id()
    {
        $user = User::factory()->create();
        $produk = Produk::factory()->create();
        $this->actingAs($user)->patch('/produk/' . $produk->id, [
            'nama_produk' => 'Produk di update'
        ]);

        $this->assertDatabaseHas('produk', Produk::where('nama_produk', 'Produk di Update')->get()->toArray());
    }
     
}
