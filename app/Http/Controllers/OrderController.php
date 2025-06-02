<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Mail\OrderNotificationMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'products'])->get();
        return response()->json($orders);
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer_id,
        ]);

        // Associa os produtos ao pedido (espera um array de IDs em 'products')
        $order->products()->attach($request->products);

        $order->load(['customer', 'products']);

        // Recupera o e-mail do cliente
        $customerEmail = $order->customer->email ?? null;

        // Dispara o e-mail
        if ($customerEmail) {
            Mail::to($customerEmail)->send(new OrderNotificationMail($order));
        }

        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        $order->load(['customer', 'products']);
        return response()->json($order);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->only('customer_id'));

        // Atualiza os produtos do pedido (espera um array de IDs em 'products')
        $order->products()->sync($request->products);

        $order->load(['customer', 'products']);

        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully.']);
    }
}
