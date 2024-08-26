@extends('layouts.app')

@section('content')
    <h1>Create A New Product</h1>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <label>Product Name:</label>
            <input type="text" name="name" >
            <label>Product Price:</label>
            <input type="float" name="price">
            <label>Content:</label>
            <textarea name="description"></textarea>
            <button type="submit">Save</button>
        </form>
@endsection