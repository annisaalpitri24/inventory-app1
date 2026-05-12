<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // // ambil kategori pertama agar tidak error
        // $category = Category::first();
        //
        // if (!$category) {
        //     return redirect('/product')->with('error', 'Kategori belum ada!');
        // }
        //
        // Product::create([
        //     'name' => 'Produk Baru',
        //     'price' => 10000,
        //     'stock' => 10, 
        //     'description' => 'Contoh deskripsi',
        //     'status' => 'tersedia',
        //     'category_id' => $category->id
        // ]);
        //
        // return redirect('/product')->with('success', 'Data berhasil ditambahkan');

        $category = Category::all();
        return view('products.create', compact('category'));
    }
    public function store()
    {
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->stock = request('stock');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->status = request('status');
        $product->save();

        return redirect()->route('product')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

   public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')
                ->with('error', 'Data tidak ditemukan');
        }

        $category = Category::all();

        return view('products.edit', compact('product', 'category'));
    }

    // Proses update
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')
                ->with('error', 'Data tidak ditemukan');
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect('/product')
            ->with('success', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('error', 'Data tidak ditemukan');
        }

        $product->delete();

        return redirect('/product')->with('success', 'Data berhasil dihapus');
    }
}
