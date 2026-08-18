<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        $title = 'Data Order';
        return view('order.index', compact('orders', 'title'));
    }

    public function create()
    {
        $categories  = Category::get();
        $products = Product::orderBy('id', 'asc')->get(); 
        $title = 'Tambah Order';
        return view('order.create', compact('title', 'categories', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_code' => 'required|string|max:255',
            'order_amount' => 'required|numeric',
            'order_change' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();
        Order::create($data);

        return redirect()->route('order.index')->with('success', 'Order berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Order $order)
    {
        $title = 'Edit Order';
        return view('order.edit', compact('order', 'title'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_code' => 'required|string|max:255',
            'order_amount' => 'required|numeric',
            'order_change' => 'required|numeric',
            'status' => 'required|boolean',
        ]);
        
        $data = $request->all();
        $order->update($data);

        return redirect()->route('order.index')->with('success', 'Order berhasil diubah.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
    }
}
