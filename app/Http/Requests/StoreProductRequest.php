<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // nanti bisa diganti dengan role admin
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // SKU Produk
            'code' => 'required|string|max:50|unique:products,code',

            // Nama Produk
            'name' => 'required|string|max:250',

            // Jumlah Stok
            'quantity' => 'required|integer|min:0|max:10000',

            // Harga Produk
            'price' => 'required|numeric|min:0',

            // Deskripsi Produk (opsional)
            'description' => 'nullable|string'
        ];
    }
}

