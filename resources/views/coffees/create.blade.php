@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Coffee</h1>
    <form action="{{ route('coffees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Coffee</button>
        <a href="{{ route('coffees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
