<?php

namespace Tests\Feature;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdukDeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_produk_by_id()
    {
        $user = User::factory()->create();
        $produk = Produk::factory()->create();

        $this->actingAs($user)->followingRedirects()->delete('/produk/' . $produk->id);
        $this->assertDatabaseMissing('produk', $produk->toArray());
    }
}
