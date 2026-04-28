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

    public function insert()
    {
        // ambil kategori pertama agar tidak error
        $category = Category::first();

        if (!$category) {
            return redirect('/product')->with('error', 'Kategori belum ada!');
        }

        Product::create([
            'name' => 'Produk Baru',
            'price' => 10000,
            'stock' => 10, 
            'description' => 'Contoh deskripsi',
            'status' => 'tersedia',
            'category_id' => $category->id
        ]);

        return redirect('/product')->with('success', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('error', 'Data tidak ditemukan');
        }

        $category = Category::first();

        $product->update([
            'name' => 'Produk Update',
            'price' => 20000,
            'description' => 'Deskripsi diupdate',
            'status' => 'habis',
            'category_id' => $category ? $category->id : $product->category_id
        ]);

        return redirect('/product')->with('success', 'Data berhasil diupdate');
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