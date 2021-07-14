<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'status', 'price'];

    // public function food_order()
    // {
    //     return $this->hasMany(FoodOrder::class);
    // }
}
