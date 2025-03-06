<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $coffees = Coffee::all();
        return view('orders.menu',compact('coffees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coffee_id'=>'required|exists:coffees,id',
            'quantity'=>'required|integer|min:1',
        ]);

        $coffee = Coffee::findOrFail($request->coffee_id);
        $totalprice =$coffee->price * $request->quantity;

       Order::create([
        'user_id'=>Auth::id(),
        'coffee_id'=>$request->coffee_id,
        'quantity'=>$request->quantity,
        'total_price'=>$totalprice,
       ]);

       return redirect()->route('orders.menu')->with('success','Order Place Successfully!');

    }

    public function customerOrders(){
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(5);
        return view('orders.my-orders',compact('orders'));
    }

    public function adminOrders(){
        $orders = Order::latest()->paginate(10); //paginate
        return view('admin.orders', compact('orders'));
    }

    public function updateOrder(Request $request, Order $order)
    {
    $request->validate([
        'status' => 'required|in:pending,completed,cancelled',
    ]);

    $order->update(['status' => $request->status]);

    return redirect()->back()->with('success', 'Order status updated successfully!');
    }


}
