<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anabul extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'ras',
        'jenis_kelamin',
        'umur',
        'warna',
        'harga',
        'foto',
        'kondisi',
        'status_ketersediaan'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'anabul_id');
    }
}
