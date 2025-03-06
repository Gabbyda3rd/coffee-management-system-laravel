@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Coffee</h1>
    <form action="{{ route('coffees.update', $coffee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $coffee->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $coffee->price }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $coffee->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Coffee</button>
        <a href="{{ route('coffees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
