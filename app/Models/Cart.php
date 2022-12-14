<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table ='cart';
    protected $primaryKey = 'id';

    protected $fillable = [
        'produk_id',
        'user_id',
        'qty'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produk(){
        return $this->belongsTo(Produk::class);
    }

}

