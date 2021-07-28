<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        if (auth()->check()) {
            return redirect('dashboard');
        }

        $tables = Table::with(['orders' => function($order) {
            $order->where('status', 'open');
        }])->get();

        return view('main', ['tables' => $tables]);
    }

    public function booking($id)
    {
        $table = Table::where('id', $id)->with(['orders' => function($order) {
            $order->where('status', 'open');
        }])->first();

        if ($table->orders->count()) {
            return abort(403);
        }


        return view('booking/create', compact('table'));
    }
}
