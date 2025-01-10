@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto flex flex-col gap-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Agregar Nuevo Gasto</h1>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('expenses.store') }}" class="bg-white rounded-xl shadow-sm p-6">
            @csrf
            <div class="flex flex-wrap gap-4">

                <!-- Description -->
                <div class="flex flex-col flex-grow min-w-[200px]">
                    <label for="description" class="text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}"
                        class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                        required>
                    @error('description')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="flex flex-col flex-grow min-w-[200px]">
                    <label for="amount" class="text-sm font-medium text-gray-700 mb-1">Monto</label>
                    <input type="number" name="amount" id="amount" value="{{ old('amount') }}"
                        class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('amount') border-red-500 @enderror"
                        step="0.01" min="0" required>
                    @error('amount')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category -->
                <div class="flex flex-col flex-grow min-w-[200px]">
                    <label for="category_id" class="text-sm font-medium text-gray-700 mb-1">Categoría</label>
                    <select name="category_id" id="category_id"
                        class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('category_id') border-red-500 @enderror" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucfirst($category->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date -->
                <div class="flex flex-col flex-grow min-w-[200px]">
                    <label for="date" class="text-sm font-medium text-gray-700 mb-1">Fecha</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}"
                        class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('date') border-red-500 @enderror"
                        required>
                    @error('date')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-end flex-grow min-w-[120px] gap-4">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        Guardar
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
