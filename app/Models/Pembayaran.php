<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'user_id',
        'pembayaran',
        'total_bayar',
        'bukti_pembayaran',
        'ekspedisi',
        'tanggal_pembayaran'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengiriman(){
        return $this->hasOne(Pengiriman::class);
    }
}
