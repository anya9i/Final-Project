<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource (Daftar Stok).
     */
    public function index() : View
    {
        return view('stok.index', [
            'stok' => Product::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource (Tambah Stok).
     */
    public function create() : View
    {
        return view('stok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('stok.index')
            ->with('success', 'Stok produk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) : View
    {
        return view('stok.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->route('stok.index')
            ->with('success', 'Stok produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route('stok.index')
            ->with('success', 'Stok produk berhasil dihapus.');
    }
}
