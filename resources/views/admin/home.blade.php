@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-primary">Welcome to the Admin Dashboard</div>

        <div class="card">
            <div class="card-body">
                <h3>Admin Controls</h3>
                <ul>
                    <li><a href="#">Manage Coffee Items</a></li>
                    <li><a href="#">View Orders</a></li>
                    <li><a href="#">Manage Users</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
