@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto flex flex-col gap-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Edit Expense</h1>
        </div>

        <!-- Edit Expense Form -->
        <form action="{{ route('expenses.update', $expense->id) }}" method="POST" class="bg-white rounded-xl shadow-sm p-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-4">
                <!-- Description -->
                <div class="flex flex-col">
                    <label for="description" class="text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <input type="text" name="description" id="description" class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ old('description', $expense->description) }}" required>
                </div>

                <!-- Amount -->
                <div class="flex flex-col">
                    <label for="amount" class="text-sm font-medium text-gray-700 mb-1">Precio</label>
                    <input type="number" name="amount" id="amount" class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ old('amount', $expense->amount) }}" min="0.01" step="0.01" required>
                </div>

                <!-- Category -->
                <div class="flex flex-col">
                    <label for="category" class="text-sm font-medium text-gray-700 mb-1">Categoría</label>
                    <select name="category" id="category" class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
                        <!-- Loop through categories from the database -->
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $expense->category_id == $category->id ? 'selected' : '' }}>
                                {{ ucfirst($category->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date -->
                <div class="flex flex-col">
                    <label for="date" class="text-sm font-medium text-gray-700 mb-1">Fecha</label>
                    <input type="date" name="date" id="date" class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ old('date', $expense->date->format('Y-m-d')) }}" required>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 mt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors w-full">
                        Actualizar
                    </button>
                    <a href="{{ route('expenses.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition-colors w-full text-center">
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
