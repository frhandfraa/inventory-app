@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto py-8 px-4">

    <!-- Header -->
    <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8 mb-8">

        <h1 class="text-4xl font-extrabold text-slate-900">
            📊 Dashboard Defalima MegaMarket
        </h1>

        <p class="mt-3 text-slate-600">
            Sistem Manajemen Inventaris Barang
        </p>

    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-slate-500 text-sm">
                        Total Produk
                    </p>

                    <h2 class="text-4xl font-bold text-slate-900 mt-2">
                        {{ $totalProduk }}
                    </h2>
                </div>

                <div class="text-5xl">
                    📦
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-slate-500 text-sm">
                        Total Kategori
                    </p>

                    <h2 class="text-4xl font-bold text-slate-900 mt-2">
                        {{ $totalKategori }}
                    </h2>
                </div>

                <div class="text-5xl">
                    🏷️
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-slate-500 text-sm">
                        Produk Tersedia
                    </p>

                    <h2 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $produkTersedia }}
                    </h2>
                </div>

                <div class="text-5xl">
                    🟢
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-slate-500 text-sm">
                        Produk Habis
                    </p>

                    <h2 class="text-4xl font-bold text-red-600 mt-2">
                        {{ $produkHabis }}
                    </h2>
                </div>

                <div class="text-5xl">
                    🔴
                </div>

            </div>

        </div>

    </div>

    <!-- Menu Cepat -->
    <div class="grid md:grid-cols-2 gap-6">

        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">

            <div class="text-5xl mb-4">
                📦
            </div>

            <h2 class="text-2xl font-bold text-slate-800">
                Kelola Produk
            </h2>

            <p class="text-slate-500 mt-2">
                Tambah, edit, dan hapus data produk inventaris.
            </p>

            <a href="{{ route('admin.products.index') }}"
               class="inline-block mt-5 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

                Lihat Produk

            </a>

        </div>

        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">

            <div class="text-5xl mb-4">
                🏷️
            </div>

            <h2 class="text-2xl font-bold text-slate-800">
                Kelola Kategori
            </h2>

            <p class="text-slate-500 mt-2">
                Tambah, edit, dan hapus kategori produk.
            </p>

            <a href="{{ route('admin.categories.index') }}"
               class="inline-block mt-5 px-5 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">

                Lihat Kategori

            </a>

        </div>

    </div>

</div>

@endsection