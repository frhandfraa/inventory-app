@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-slate-50 py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white shadow-sm rounded-xl border border-slate-200 overflow-hidden mb-6">
                <div class="px-6 py-6 sm:px-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-900">✏️ Edit Produk</h1>
                            <p class="mt-2 text-slate-600">Perbarui informasi produk "{{ $product->name }}" dalam sistem inventaris.</p>
                        </div>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-600 text-white text-sm font-medium rounded-lg hover:bg-slate-700 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="bg-white shadow-sm rounded-xl border border-slate-200 overflow-hidden">
                <form action="{{ route('products.update', $product) }}" method="POST" class="divide-y divide-slate-200">
                    @csrf
                    @method('PUT')

                    <!-- Nama Produk -->
                    <div class="px-6 py-6 sm:px-8">
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                               placeholder="Masukkan nama produk" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="px-6 py-6 sm:px-8">
                        <label for="category_id" class="block text-sm font-medium text-slate-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="category_id" id="category_id"
                                class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 @enderror" required>
                            <option value="">Pilih kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="px-6 py-6 sm:px-8">
                        <label for="description" class="block text-sm font-medium text-slate-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                                  placeholder="Masukkan deskripsi produk (opsional)">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="px-6 py-6 sm:px-8">
                        <label for="price" class="block text-sm font-medium text-slate-700 mb-2">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" min="0"
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror"
                               placeholder="0" required>
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stok -->
                    <div class="px-6 py-6 sm:px-8">
                        <label for="stock" class="block text-sm font-medium text-slate-700 mb-2">
                            Stok <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0"
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('stock') border-red-500 @enderror"
                               placeholder="0" required>
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="px-6 py-6 sm:px-8">
                        <label for="status" class="block text-sm font-medium text-slate-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="radio" name="status" id="tersedia" value="tersedia"
                                       {{ old('status', $product->status) == 'tersedia' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300">
                                <label for="tersedia" class="ml-2 text-sm text-slate-700">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Tersedia
                                    </span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="status" id="habis" value="habis"
                                       {{ old('status', $product->status) == 'habis' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300">
                                <label for="habis" class="ml-2 text-sm text-slate-700">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Habis
                                    </span>
                                </label>
                            </div>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="px-6 py-6 sm:px-8 bg-slate-50">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('products.index') }}"
                                   class="px-4 py-2 bg-slate-600 text-white text-sm font-medium rounded-lg hover:bg-slate-700 transition-colors">
                                    Batal
                                </a>
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Update Produk
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="px-6 py-6 sm:px-8 bg-slate-50">
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Produk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stockInput = document.querySelector('#stock');
            const statusRadios = document.querySelectorAll('input[name="status"]');

            if (! stockInput || statusRadios.length === 0) {
                return;
            }

            const updateStockState = function () {
                const selected = document.querySelector('input[name="status"]:checked');

                if (selected && selected.value === 'habis') {
                    stockInput.value = 0;
                    stockInput.readOnly = true;
                    stockInput.classList.add('bg-slate-100', 'cursor-not-allowed');
                } else {
                    stockInput.readOnly = false;
                    stockInput.classList.remove('bg-slate-100', 'cursor-not-allowed');
                }
            };

            statusRadios.forEach(function (radio) {
                radio.addEventListener('change', updateStockState);
            });

            updateStockState();
        });
    </script>
@endsection