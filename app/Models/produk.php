<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nm_produk',
        'img',
        'merek_id',
        'kategori_id',
        'deskripsi',
        'harga'
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function merek()
    {
        return $this->belongsTo(merek::class);
    }
}
