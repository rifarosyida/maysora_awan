<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_produk',
        'foto_produk',
        'harga',
        'stok',
        'diskon',
        'deskripsi',
        'kategori_id',
        'supplier_id'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
