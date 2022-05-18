<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'harga', 'gambar', 'deskripsi', 'status'];

    public function pesanans()
    {
        return $this->belongsToMany(Pesanan::class)->withPivot('qty');
    }

    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["Kosong", "Ready"][$value],
        );
    }
}