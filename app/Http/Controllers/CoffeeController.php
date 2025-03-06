<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffees = Coffee::all();
        return view('coffees.index', compact('coffees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coffees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'description'=>'required',
        ]);

        Coffee::create($request->all());
        return redirect()->route('coffees.index')->with('success','Coffee Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coffee $coffee)
    {
        return view('coffees.edit', compact('coffee'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coffee $coffee)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'description'=>'required',
        ]); 

        $coffee->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();
        return redirect()->route('coffees.index')->with('success','Coffee Successfully deleted');
    }
}
