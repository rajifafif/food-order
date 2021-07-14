<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tables = Table::with(['orders' => function($order) {
            $order->where('status', 'open');
        }])->get();

        return view('dashboard', ['tables' => $tables]);
    }
}
