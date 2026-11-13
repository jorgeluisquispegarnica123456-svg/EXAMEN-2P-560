@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">

    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/productos/{{ $producto->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Categoría:
            </label>

            <select name="categoria_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                required>

                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Nombre:
            </label>

            <input type="text"
                name="nombre"
                value="{{ old('nombre', $producto->nombre) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                SKU:
            </label>

            <input type="text"
                name="sku"
                value="{{ old('sku', $producto->sku) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Precio:
            </label>

            <input type="number"
                step="0.01"
                name="precio"
                value="{{ old('precio', $producto->precio) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Stock:
            </label>

            <input type="number"
                name="stock"
                value="{{ old('stock', $producto->stock) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                required>
        </div>

        <div class="flex items-center justify-between">

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Actualizar
            </button>

            <a href="/productos"
                class="text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>
</div>

@endsection
