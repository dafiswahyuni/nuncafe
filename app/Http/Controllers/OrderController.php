<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of orders
    public function index()
    {
        return Order::with('items.menu')->get();
    }

    // Show the form for creating a new order
    public function create()
{
    $menus = Menu::all(); // Mengambil semua menu
    return view('order.create', compact('menus'));
}


    // Store a newly created order
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'table_number' => 'required|integer|min:1',
            'items' => 'required|array',
            'items.*.menu_id' => 'required|integer|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'name' => $request->name,
            'table_number' => $request->table_number,
            'status' => 'pending',
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return response()->json(['message' => 'Order created successfully', 'data' => $order], 201);
    }

    // Display a specific order
    public function show(Order $order)
    {
        $order->load('items.menu'); // Memastikan relasi items dan menu dimuat
        return view('order.show', compact('order'));
    }
    
    // Show the form for editing an order
    public function edit(Order $order)
    {
        // Not used for APIs, usually handled on the frontend.
    }

    // Update an order
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $order->update(['status' => $request->status]);

        return response()->json(['message' => 'Order status updated successfully', 'data' => $order]);
    }

    // Remove an order
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
