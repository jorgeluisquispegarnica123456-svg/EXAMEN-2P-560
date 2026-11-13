@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Lista de Productos</h1>
    <a href="/productos/create"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Nuevo Producto
    </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($productos as $producto)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->nombre }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->sku }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($producto->precio, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->stock }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="/productos/{{ $producto->id }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Ver</a>
                    <a href="/productos/{{ $producto->id }}/edit" class="text-yellow-600 hover:text-yellow-900 mr-3">Editar</a>
                    <form action="/productos/{{ $producto->id }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar este producto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
