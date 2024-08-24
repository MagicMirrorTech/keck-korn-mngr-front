@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>
    @foreach($selected_products as $product)
    <div class="row">
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
    <p>Please enter your shipping address and payment information to complete your purchase.</p>
    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf
        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="payment_info" class="form-label">Payment Information</label>
            <input type="text" class="form-control" id="payment_info" name="payment_info">
        </div>
        <button type="submit" class="btn btn-primary">Complete Purchase</button>
    </form>
</div>
@endsection
