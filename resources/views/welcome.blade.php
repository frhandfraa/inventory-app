<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Defalima MegaMarket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    <div class="min-h-screen flex items-center justify-center px-6">

        <div class="max-w-4xl w-full text-center">

            <h1 class="text-5xl font-extrabold text-slate-900">
                🏪 Defalima MegaMarket
            </h1>

            <p class="mt-4 text-slate-600">
                Sistem Inventaris & Manajemen Barang
            </p>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- ADMIN --}}
                <div class="bg-white p-8 rounded-2xl shadow">

                    <h2 class="text-2xl font-bold">
                        Admin Panel
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Kelola produk & kategori
                    </p>

                    <a href="{{ route('admin.auth.login') }}"
                       class="mt-6 block bg-indigo-600 text-white py-3 rounded-xl hover:bg-indigo-700">
                        Masuk Admin
                    </a>

                </div>

                {{-- USER --}}
                <div class="bg-white p-8 rounded-2xl shadow">

                    <h2 class="text-2xl font-bold">
                        User Dashboard
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Lihat produk tersedia
                    </p>

                    <a href="{{ route('user.login') }}"
                       class="mt-6 block bg-green-600 text-white py-3 rounded-xl hover:bg-green-700">
                        Masuk User
                    </a>

                </div>

            </div>

            <div class="mt-10 text-sm text-slate-400">
                © {{ date('Y') }} Defalima MegaMarket
            </div>

        </div>

    </div>

</body>
</html>