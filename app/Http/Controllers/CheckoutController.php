<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'address' => 'required',
            'payment_info' => 'required',
        ]);

        // Assuming you have some logic to calculate the total price and create an order
        $order = Order::create([
            'total_price' => 100.00, // Replace with actual logic
            'status' => 'pending',
        ]);

        // Create a checkout entry associated with the order
        Checkout::create([
            'order_id' => $order->id,
            'address' => $validatedData['address'],
            'payment_info' => json_encode($validatedData['payment_info']), // Or however you plan to handle payment info
        ]);

        // Redirect to a confirmation page or back to the checkout with a success message
        return redirect()->route('pages.home')->with('success', 'Your order has been processed successfully!');
    }
}
