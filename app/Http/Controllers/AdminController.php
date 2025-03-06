<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'totalOrders' => Order::count(),
            'totalCoffees' => Coffee::count(),
        ]);
    }
}
