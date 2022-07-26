<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'date',
        'city_id',
        'total',
        'status',
        'snap_token',
        'name',
        'address',
        'phone_number',
        'email',
        'notes'
    ];

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
        return $this->belongsToMany(Menu::class)->withPivot('qty');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}