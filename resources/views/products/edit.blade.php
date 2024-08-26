@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')
            <label>Product Name:</label>
            <input type="text" name="name" value="{{ $product->name }}">
            <label>Price:</label>
            <input type="float" name="price" value="{{ $product->price }}">
            <label>Description:</label>
            <textarea name="description">{{ $product->description }}</textarea>
            <button type="submit">Update</button>
        </form>
@endsection