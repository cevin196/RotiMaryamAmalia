<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal', 'total', 'status'];

    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["Checkout", "Selesai"][$value],
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('qty');
    }
}