@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Coffee Menu</h1>
    <a href="{{ route('coffees.create') }}" class="btn btn-primary mb-3">Add Coffee</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coffees as $coffee)
                <tr>
                    <td>{{ $coffee->name }}</td>
                    <td>${{ $coffee->price }}</td>
                    <td>{{ $coffee->description }}</td>
                    <td>
                        <a href="{{ route('coffees.edit', $coffee->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('coffees.destroy', $coffee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
