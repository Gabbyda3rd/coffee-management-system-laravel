@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('customer.dashboard') }}" class="list-group-item list-group-item-action active">
                    <i class="bi bi-house"></i> Dashboard
                </a>
                <a href="{{ route('orders.menu') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-cup"></i> Order Coffee
                </a>
                <a href="{{ route('orders.my') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-list-check"></i> My Orders
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Welcome, {{ Auth::user()->name }}</h4>
                </div>
                <div class="card-body">
                    <p class="lead">Explore our coffee menu and place your order!</p>
                    <div class="row">
                        <!-- Order Coffee -->
                        <div class="col-md-6">
                            <div class="card border-info">
                                <div class="card-body">
                                    <h5 class="card-title">Order Coffee</h5>
                                    <p class="card-text display-4">{{ $availableCoffees }}</p>
                                    <a href="{{ route('orders.menu') }}" class="btn btn-info">View Menu</a>
                                </div>
                            </div>
                        </div>
                        <!-- My Orders -->
                        <div class="col-md-6">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <h5 class="card-title">My Orders</h5>
                                    <p class="card-text display-4">{{ $totalOrders }}</p>
                                    <a href="{{ route('orders.my') }}" class="btn btn-warning">View My Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
