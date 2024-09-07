<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'tanggal_penjualan',
        'pelanggan',
        'jumlah',
        'harga_satuan',
        'total',
    ];
}
