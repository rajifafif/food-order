<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_nbr',
        'table_id',
        'kasir_id',
        'status',
        'total_price'
    ];

    public function table() {
        return $this->belongsTo(Table::class);
    }

    public function food_orders() {
        return $this->hasMany(FoodOrder::class);
    }

    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    public function getTotalFoodAttribute()
    {
        return $this->food_orders->sum('qty');
    }

    public function getNewOrderNumber()
    {
        $latestOrder = Self::latest()->first();

        if ($latestOrder) {
            $lastId = Helper::getOrderNbrId($latestOrder->order_nbr);
            return Helper::makeOrderNbr($lastId);
        } else {
            return Helper::makeOrderNbr(0);
        }
    }

    public function closeOrder($kasir)
    {
        $order = $this->load('food_orders', 'food_orders.food');

        $total_price = $order->food_orders->sum(function($foodOrder){
            return $foodOrder->qty * $foodOrder->food->price;
        });
        $order->total_price = $total_price;
        $order->kasir_id = $kasir->id;
        $order->status = 'closed';

        $order->save();

        return $order;
    }
}
