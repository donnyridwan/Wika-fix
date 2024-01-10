<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = [
        'Kota_asal',
        'Kota_Tujuan',
        'jam_berangkat',
        'jam_tiba',
        'maskapai',
        'harga',
        'kode_tiket',
        'status',
        'pemesan',
        'penumpang',
    ];
}
