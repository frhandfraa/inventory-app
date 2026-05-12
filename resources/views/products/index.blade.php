{{-- resources/views/products/index.blade.php --}}
@extends('layouts.main')

@section('content')
<div class="py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">
                <div class="px-8 py-8">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div>
                            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">
                                📦 Inventaris Barang Defalima MegaMarket
                            </h1>

                            <p class="mt-3 text-slate-600 text-base">
                                Manajemen Gudang dan Stok Barang untuk Defalima MegaMarket. Pantau, kelola, dan optimalkan inventaris Anda dengan mudah.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-3">

                            <a href="{{ route('products.create') }}"
                               class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md transition-all duration-200 hover:scale-105">

                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 4v16m8-8H4" />
                                </svg>

                                Tambah Barang Manual
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                        ✅
                    </div>

                    <div>
                        <p class="font-semibold text-green-800">
                            Berhasil
                        </p>

                        <p class="text-sm text-green-700">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                        ❌
                    </div>

                    <div>
                        <p class="font-semibold text-red-800">
                            Gagal
                        </p>

                        <p class="text-sm text-red-700">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Card Table --}}
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">

            {{-- Table Header --}}
            <div class="px-8 py-5 border-b border-slate-200 bg-slate-50">
                <div class="flex items-center justify-between flex-wrap gap-4">

                    <div>
                        <h2 class="text-xl font-bold text-slate-800">
                            Daftar Produk
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Total Produk:
                            <span class="font-semibold text-slate-700">
                                {{ $products->total() }}
                            </span>
                        </p>
                    </div>

                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                No
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Nama Barang
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Kategori
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Deskripsi
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Status
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Harga
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Stok
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-600">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">

                        @forelse($products as $p)

                            <tr class="hover:bg-slate-50 transition duration-200">

                                {{-- Nomor --}}
                                <td class="px-6 py-5">
                                    <div class="font-semibold text-slate-700">
                                        {{ (($products->currentPage() - 1) * $products->perPage()) + $loop->iteration }}
                                    </div>
                                </td>

                                {{-- Nama --}}
                                <td class="px-6 py-5">
                                    <div class="font-semibold text-slate-900">
                                        {{ $p->name }}
                                    </div>
                                </td>

                                {{-- Kategori --}}
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                                        {{ $p->category->name }}
                                    </span>
                                </td>

                                {{-- Deskripsi --}}
                                <td class="px-6 py-5 text-sm text-slate-600 max-w-xs">
                                    <div class="line-clamp-2">
                                        {{ $p->description ?? '-' }}
                                    </div>
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-5">

                                    @if($p->status === 'tersedia')

                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                            🟢 Tersedia
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                                            🔴 Habis
                                        </span>

                                    @endif

                                </td>

                                {{-- Harga --}}
                                <td class="px-6 py-5">
                                    <div class="font-bold text-slate-900">
                                        Rp {{ number_format($p->price, 0, ',', '.') }}
                                    </div>
                                </td>

                                {{-- Stok --}}
                                <td class="px-6 py-5">
                                    <div class="font-medium text-slate-700">
                                        {{ $p->stock }}
                                    </div>
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('products.edit', $p) }}"
                                           class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-indigo-100 text-indigo-700 hover:bg-indigo-600 hover:text-white transition duration-200">

                                            <svg class="w-5 h-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('products.destroy', $p) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                    class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-red-100 text-red-700 hover:bg-red-600 hover:text-white transition duration-200">

                                                <svg class="w-5 h-5"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="px-6 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="text-6xl mb-4">
                                            📦
                                        </div>

                                        <h3 class="text-lg font-bold text-slate-700">
                                            Belum Ada Data
                                        </h3>

                                        <p class="text-slate-500 mt-2">
                                            Silakan tambahkan data inventaris baru.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            <div class="px-6 py-5 border-t border-slate-200 bg-slate-50">
                {{ $products->links('pagination::tailwind') }}
            </div>

        </div>
    </div>
</div>
@endsection