@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Detalle del Producto</h1>
    <div class="mb-4">
        <strong>Nombre:</strong> <p>{{ $producto->nombre }}</p>
    </div>
    <div class="mb-4">
        <strong>SKU:</strong> <p>{{ $producto->sku }}</p>
    </div>
    <div class="mb-4">
        <strong>Categoría:</strong> <p>{{ $producto->categoria->nombre ?? 'N/A' }}</p>
    </div>
    <div class="mb-4">
        <strong>Precio:</strong> <p>${{ number_format($producto->precio, 2) }}</p>
    </div>
    <div class="mb-4">
        <strong>Stock:</strong> <p>{{ $producto->stock }}</p>
    </div>
    <div class="mt-6">
        <a href="/productos" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Volver</a>
    </div>
</div>
@endsection
