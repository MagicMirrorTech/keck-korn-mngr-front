@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Our Products</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <ul>
                    @foreach($product->details as $detail)
                        <li><strong>{{ ucfirst($detail->detail_key) }}:</strong> {{ $detail->detail_value }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
@endsection
