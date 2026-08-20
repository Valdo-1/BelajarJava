<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\OrderDetail;
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
        
        $todayRevenue = Order::whereDate('created_at', today())->sum('order_amount');
        $productSold = OrderDetail::sum('quantity');
        $totalRevenue = Order::sum('order_amount');

        $title = 'Tambah Order';
        return view('order.create', compact('title', 'categories', 'products', 'todayRevenue', 'productSold', 'totalRevenue'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_code' => 'required|string|max:255',
            'status' => 'required|boolean',
            'cart' => 'required|array|min:1',
            'payment' => 'required|numeric|min:0',
        ]);

        $subtotal = 0;
        $orderItems = [];

        // Validasi dan hitung subtotal murni dari database (menghindari manipulasi via inspect element)
        foreach ($request->cart as $item) {
            $product = Product::findOrFail($item['product_id']);
            $quantity = $item['quantity'];
            $price = $product->price;
            $itemTotal = $quantity * $price;
            
            $subtotal += $itemTotal;
            
            $orderItems[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
                'total_price' => $itemTotal,
            ];
        }

        // Hitung Pajak 11% dan Total
        $tax = $subtotal * 0.11;
        $totalAmount = $subtotal + $tax;
        
        $payment = $request->payment;
        $change = $payment - $totalAmount;

        // Validasi uang tidak boleh kurang
        if ($change < 0) {
            return back()->withErrors(['payment' => 'Uang pembayaran kurang dari total tagihan!'])->withInput();
        }

        // Simpan data order
        $order = Order::create([
            'order_code' => $request->order_code,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'order_amount' => $totalAmount,
            'order_change' => $change,
            'status' => $request->status,
        ]);

        // Simpan detail produk
        foreach ($orderItems as $itemData) {
            $itemData['order_id'] = $order->id;
            OrderDetail::create($itemData);
        }

        return redirect()->route('order.index')->with('success', 'Order berhasil ditambahkan beserta pajak 11%.');
    }

    public function show(string $id)
    {
        $order = Order::with(['order_details.product'])->findOrFail($id);
        $title = 'Detail Order';
        return view('order.show', compact('order', 'title'));
    }

    public function edit(Order $order)
    {
        return redirect()->route('order.index')->with('error', 'Transaksi yang sudah selesai tidak dapat diedit kembali.');
    }

    public function update(Request $request, Order $order)
    {
        return redirect()->route('order.index')->with('error', 'Transaksi yang sudah selesai tidak dapat diupdate.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
    }
}
