<?php

namespace Tests\Feature;

use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Produk;
use App\Models\Supplier;

class ProdukTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_produk_page_can_be_rendered_if_user_authenticated ()
    {
        // membuat user
        $user = User::factory()->create();
        // user login lalu mengunjungi route /produk
        $response = $this->actingAs($user)->get('/produk');
        // laman produk berhasil dibuka
        $response->assertStatus(200);
        // sistem menampilkan data produk dengan header tabel seperti berikut
        $response->assertSeeText('Data Produk');
        $response->assertSeeText('Id');
        $response->assertSeeText('Nama Produk');
        $response->assertSeeText('Foto Produk');
        $response->assertSeeText('Harga');
        $response->assertSeeText('Stok');
        $response->assertSeeText('Diskon');
        $response->assertSeeText('Deskripsi');
        $response->assertSeeText('Nama Kategori');
        $response->assertSeeText('Nama Supplier');
        $response->assertSeeText('Action');        
    }

    public function test_redirect_if_user_not_authenticated()
    {
        // user mengakses laman produk tanpa login
        $response = $this->followingRedirects()->get('/produk');
        // sistem meredirect ke lama login
        $response->assertStatus(200);
        $response->assertSeeText('Masuk Untuk Melanjutkan');
        $response->assertSee('Email');
        $response->assertSee('Password');
        $response->assertSee('Remember Me');
        $response->assertSee('Sign In');
    }

    public function test_produk_store()
    {
        // membuat user
        $user = User::factory()->create();
        // membuat data produk
        $produk = Produk::factory()->create();

        // login lalu melakukan add produk
        $response = $this->actingAs($user)->post('/produk', $produk->toArray());

        $response->assertStatus(302);
        // memastikan apakah data yang di add ada pada database
        $this->assertDatabaseHas('produk', $produk->toArray());
    }

    public function test_produk_store_with_null_value_on_fields()
    {   
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/produk', [
            'nama_produk' => '',
            'foto_produk' => '',
            'harga' => '',
            'stok' => '',
            'diskon' => '',
            'deskripsi' => '',
            'kategori_id' => '',
            'supplier_id' => '',
        ]);

        $response->assertStatus(302);
        $response->assertInvalid([
            'nama_produk' => 'The nama produk field is required.',
            'harga' => 'The harga field is required.',
            'stok' => 'The stok field is required.',
            'deskripsi' => 'The deskripsi field is required.',
            'kategori_id' => 'The kategori id field is required.',
            'supplier_id' => 'The supplier id field is required.',
        ]);
    }

    public function test_produk_store_with_invalid_value()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/produk', [
            'nama_produk' => 23,
            'foto_produk' => 'assets/img.jpg',
            'harga' => 'abc',
            'stok' => 'abc',
            'diskon' => 0,
            'deskripsi' => 200,
            'kategori_id' => 'abc',
            'supplier_id' => 'abc',
        ]);

        $response->assertStatus(302);
        $response->assertInvalid([
            'nama_produk' => 'The nama produk must be a string.',
            'harga' => 'The harga must be an integer.',
            'stok' => 'The stok must be an integer.',
            'kategori_id' => 'The kategori id must be an integer.',
            'supplier_id' => 'The supplier id must be an integer.',           
        ]);
    }
}
