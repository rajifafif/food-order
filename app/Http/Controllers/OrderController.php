<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodOrder;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = new Order();
        $orders = $orders->with('food_orders');
        $user = auth()->user();

        if ($user->hasRole('Pelayan')) {
            $orders = $orders->whereHas('food_orders', function($food_orders) use ($user){
                return $food_orders->where('pelayan_id', $user->id);
            });
        }

        $orders = $orders->paginate();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id)->load('food_orders', 'food_orders.food');

        return view('orders.view', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id)->load('table', 'food_orders', 'food_orders.food');
        $foods = Food::get();

        return view('orders.edit', compact('order', 'foods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function orderOnTable($id)
    {
        $table = Table::findOrFail($id);
        //TODO check if table used;

        $newOrderNbr = (new Order)->getNewOrderNumber();
        $order = Order::create([
            'order_nbr' => $newOrderNbr,
            'table_id' => $table->id,
            'status' => 'open',
            'total_price' => 0,
        ]);

        return redirect(route('orders.edit', $order));
    }

    public function orderAddFood(Request $request)
    {
        $user = auth()->user();

        $foodOrder = FoodOrder::firstOrNew([
            'order_id' => $request->order_id,
            'food_id' => $request->food_id
        ]);

        if ($request->has('qty')) {
            $foodOrder->qty = $request->qty;
        } else {
            $foodOrder->qty = ($foodOrder->qty ?? 0) + 1;
        }
        $foodOrder->pelayan_id = $user->id;
        $foodOrder->food_id = $request->food_id;
        $foodOrder->save();

        $order = Order::findOrFail($request->order_id)->load('food_orders', 'food_orders.food');

        return response()->json($order);
    }

    public function orderDeleteFood(Request $request)
    {
        $foodOrder = FoodOrder::where([
            'order_id' => $request->order_id,
            'food_id' => $request->food_id
        ])->firstOrFail();
        $foodOrder->delete();

        $order = Order::findOrFail($request->order_id)->load('food_orders', 'food_orders.food');

        return response()->json($order);
    }

    public function orderClose($id)
    {
        $kasir = auth()->user();

        $order = Order::findOrFail($id);

        $order = $order->closeOrder($kasir);

        return redirect( route('orders.show', $order->id));
    }

    public function print()
    {
        //Generate PDF?
        $orders = new Order();
        $orders = $orders->with('food_orders');
        $user = auth()->user();

        if ($user->hasRole('Pelayan')) {
            $orders = $orders->whereHas('food_orders', function($food_orders) use ($user){
                return $food_orders->where('pelayan_id', $user->id);
            });
        }

        $orders = $orders->get();

        return view('orders.print', compact('orders'));
    }
}
