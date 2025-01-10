@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-7xl mx-auto flex flex-col gap-6">
            <!-- Encabezado -->
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-800">Gastos</h1>
            </div>

            <!-- Filtros -->
            <form method="GET" action="{{ route('expenses.index') }}" class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex flex-wrap gap-4">
                    <div class="flex flex-col flex-grow min-w-[200px]">
                        <label for="category" class="text-sm font-medium text-gray-700 mb-1">Categoría</label>
                        <select name="category" id="category"
                            class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Todas las categorías</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ ucfirst($category->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col flex-grow min-w-[200px]">
                        <label for="start_date" class="text-sm font-medium text-gray-700 mb-1">Fecha de inicio</label>
                        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                            class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col flex-grow min-w-[200px]">
                        <label for="end_date" class="text-sm font-medium text-gray-700 mb-1">Fecha de finalización</label>
                        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}"
                            class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex items-end flex-grow min-w-[120px]">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>

            <!-- Tabla -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th
                                    class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider px-6 py-3">
                                    Descripción</th>
                                <th
                                    class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider px-6 py-3">
                                    Precio</th>
                                <th
                                    class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider px-6 py-3">
                                    Categoría</th>
                                <th
                                    class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider px-6 py-3">
                                    Fecha</th>
                                <th
                                    class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider px-6 py-3">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($expenses as $expense)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $expense->description }}</td>
                                    <td class="px-6 py-4 text-sm text-emerald-600 font-medium">
                                        ${{ number_format($expense->amount, 2) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ ucfirst($expense->category->name) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $expense->date->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="{{ route('expenses.edit', $expense->id) }}"
                                                class="inline-flex px-3 py-1.5 text-sm font-medium text-white bg-amber-500 hover:bg-amber-600 rounded-lg transition-colors">
                                                Editar
                                            </a>
                                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex px-3 py-1.5 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-lg transition-colors"
                                                    onclick="return confirm('Are you sure you want to delete this expense?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Resumen -->
            <!-- Category Breakdown -->
            <div class="flex-1 bg-white rounded-xl shadow-sm p-6">
                <h5 class="text-xl font-semibold text-gray-800 mb-4">Gastos por categoría</h5>
                <div class="flex flex-col gap-3">
                    @foreach ($categoryTotals as $categoryId => $categoryTotal)
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">{{ ucfirst($categories->firstWhere('id', $categoryId)->name) }}</span>
                            <span class="text-emerald-600 font-medium">${{ number_format($categoryTotal, 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Total Expenses -->
                <div class="flex-1 bg-white rounded-xl shadow-sm p-6">
                    <h4 class="text-xl font-semibold text-gray-800 mb-4">Gastos totales </h4>
                    <p class="text-2xl font-bold text-emerald-600">${{ number_format($total, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
