<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'anabul_id',
        'no_hp',
        'metode_pembelian',
        'tanggal_pengambilan',
        'waktu_pengambilan',
        'alamat_pengiriman',
        'estimasi_pengiriman',
        'metode_pembayaran',
        'bukti_pembayaran',
        'catatan',
        'status_pesanan',
        'alasan_pembatalan',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function anabul()
    {
        return $this->belongsTo(Anabul::class, 'anabul_id');
    }
}
