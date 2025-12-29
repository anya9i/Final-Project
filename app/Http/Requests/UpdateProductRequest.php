<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // SKU Produk (abaikan data sendiri saat update)
            'code' => 'required|string|max:50|unique:products,code,' . $this->route('product')->id,

            // Nama Produk
            'name' => 'required|string|max:250',

            // Jumlah Stok
            'quantity' => 'required|integer|min:0|max:10000',

            // Harga Produk
            'price' => 'required|numeric|min:0',

            // Deskripsi (opsional)
            'description' => 'nullable|string'
        ];
    }
}
