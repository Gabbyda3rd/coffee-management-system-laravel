{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Welcome to the Coffee Management System!</h1>
            <p class="lead">Manage orders, view coffee menus, and place your orders with ease.</p>
            
            @if(Auth::user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Go to Admin Dashboard</a>
            @else
                <a href="{{ route('customer.dashboard') }}" class="btn btn-dark">Go to Customer Dashboard</a>
            @endif
        </div>
    </div>
</div>
@endsection --}}
