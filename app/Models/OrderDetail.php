<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'produk_id',
        'order',
        'qty'
    ];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
