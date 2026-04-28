<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return view('products.index', compact('products'));
    }

    // Manual CRUD methods
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:tersedia,habis',
        ]);

        Product::create($request->all());

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:tersedia,habis',
        ]);

        $product->update($request->all());

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
    }

    // Legacy auto methods (keep for backward compatibility)
    public function insert()
    {
        $category = Category::firstOrCreate(['name' => 'Elektronik']);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Produk Tambahan Otomatis',
            'description' => 'Produk baru yang ditambahkan secara otomatis melalui route insert.',
            'price' => 125000,
            'stock' => 20,
            'status' => 'tersedia',
        ]);

        return redirect('/products')->with('success', "Produk berhasil ditambahkan: {$product->name} (ID {$product->id})");
    }

    public function updateLegacy(int $id = null)
    {
        $product = $id ? Product::find($id) : Product::first();

        if (! $product) {
            return redirect('/products')->with('error', 'Produk tidak ditemukan untuk diupdate.');
        }

        $product->update([
            'name' => 'Produk Diperbarui Otomatis',
            'description' => 'Deskripsi produk telah diperbarui melalui route update.',
            'price' => 135000,
            'stock' => 35,
            'status' => 'tersedia',
        ]);

        return redirect('/products')->with('success', "Produk berhasil diupdate: {$product->name} (ID {$product->id})");
    }

    public function delete(int $id = null)
    {
        $product = $id ? Product::find($id) : Product::latest()->first();

        if (! $product) {
            return redirect('/products')->with('error', 'Produk tidak ditemukan untuk dihapus.');
        }

        $productName = $product->name;
        $product->delete();

        return redirect('/products')->with('success', "Produk berhasil dihapus: {$productName}");
    }
}
