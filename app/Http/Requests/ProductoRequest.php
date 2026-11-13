<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productoId = $this->route('producto') ? $this->route('producto')->id : null;

        return [
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:150',
            'sku' => [
                'required',
                'string',
                'max:50',
                Rule::unique('productos', 'sku')->ignore($productoId),
            ],
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'disponible' => 'boolean',
        ];
    }
}