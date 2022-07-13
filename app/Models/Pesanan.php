<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal', 'total', 'status', 'pesanan', 'nama', 'alamat', 'telepon', 'email', 'nomor_pesanan'];

    // protected function status(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["pending", "Selesai", "Batal"][$value],
    //     );
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('qty', 'harga');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}