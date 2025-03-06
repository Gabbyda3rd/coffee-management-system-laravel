@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action active">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a href="{{ route('admin.orders') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-cart"></i> Manage Orders
                </a>
                <a href="{{ route('coffees.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-cup"></i> Manage Coffee Menu
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
                    <p class="lead">This is the admin dashboard where you can manage orders and coffee menu.</p>
                    <div class="row">
                        <!-- Orders Summary -->
                        <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders</h5>
                                    <p class="card-text display-4">{{ $totalOrders }}</p>
                                    <a href="{{ route('admin.orders') }}" class="btn btn-primary">View Orders</a>
                                </div>
                            </div>
                        </div>
                        <!-- Coffee Items -->
                        <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-body">
                                    <h5 class="card-title">Coffee Menu</h5>
                                    <p class="card-text display-4">{{ $totalCoffees }}</p>
                                    <a href="{{ route('coffees.index') }}" class="btn btn-success">Manage Menu</a>
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
