<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk
     */
    public function index(Request $request)
    {
        // Mulai query produk + relasi kategori
        $query = Product::with('category');

        // 3. Pencarian produk berdasarkan nama / deskripsi
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // 4. Filter harga (range)
        if ($request->filled('min_price')) {
            $query->where('price', '>=', (int) $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', (int) $request->max_price);
        }

        // 5. Urutkan hasil
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'asc');
            }
        } else {
            // default kalau tidak ada sort
            $query->orderBy('id', 'asc');
        }

        // Ambil data akhirnya
        $products = $query->get();

        // Sesuaikan dengan view yang kamu pakai
        return view('products.products', compact('products'));
    }

    /**
     * Form tambah produk
     */
    public function create()
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Simpan produk baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer',
            'description' => 'nullable|string',
            'image'       => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk baru berhasil disimpan.');
    }

    /**
     * Form edit produk
     */
    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update data produk
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer',
            'description' => 'nullable|string',
            'image'       => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', "Produk berhasil diupdate.");
    }

    /**
     * Hapus produk
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', "Produk berhasil dihapus.");
    }
}
