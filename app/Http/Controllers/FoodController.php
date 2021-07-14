<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::paginate();

        return view('foods/index', compact(['foods']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $food_types = config('data.food_types');

        return view('foods/create', compact('food_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => ''
        ]);
        //handle checkbox
        $data['status'] = isset($data['status']) ? 'ready' : 'empty';

        Food::create($data);

        return redirect(route('foods.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $food_types = config('data.food_types');

        return view('foods/edit', compact('food', 'food_types'));
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
        $food = Food::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => ''
        ]);
        //handle checkbox
        $data['status'] = isset($data['status']) ? 'ready' : 'empty';

        $food->fill($data);
        $food->save();

        return redirect(route('foods.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect(route('foods.index'));
    }
}
