<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.dashboard', [
            'availableCoffees' =>Coffee::count(),
            'totalOrders' => Order::where('user_id', Auth::id())->count()
        ]);
    }
}
