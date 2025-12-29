<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',        // SKU Produk
        'name',        // Nama Produk
        'quantity',    // Jumlah Stok
        'price',       // Harga
        'description'
    ];
}
