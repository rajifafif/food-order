<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    use HasFactory;

    protected $fillable = ['food_id', 'order_id', 'pelayan_id'];

    protected $appends = [
        'total_price'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function pelayan()
    {
        return $this->belongsTo(User::class, 'pelayan_id');
    }

    public function getTotalPriceAttribute()
    {
        return Helper::moneyFormat($this->qty * $this->food->price);
    }
}
