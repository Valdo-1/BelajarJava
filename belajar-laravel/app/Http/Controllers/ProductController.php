<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        $title = 'Data Produk';
        return view('product.index', compact('products', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Produk';
        $categories = Category::get();
        return view('product.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->hashName();
            $file->move(storage_path('app/public/uploads/products'), $filename);
            $data['photo'] = 'uploads/products/' . $filename;
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $title = 'Edit Produk';
        return view('product.edit', compact('product', 'categories', 'title'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->hashName();
            $file->move(public_path('uploads/products'), $filename);
            $data['photo'] = $filename;
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diubah.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'product berhasil dihapus.');
    }
}
