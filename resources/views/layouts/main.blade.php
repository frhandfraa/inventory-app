<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defalima MegaMarket</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md border-b border-slate-200">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-center h-16">

                <h1 class="font-bold text-xl text-slate-800">
                    🏪 Defalima MegaMarket
                </h1>

                <div class="flex gap-3">

                    <a href="{{ route('admin.home') }}"
                       class="px-4 py-2 rounded-lg hover:bg-slate-100">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.products.index') }}"
                       class="px-4 py-2 rounded-lg hover:bg-slate-100">
                        Produk
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                       class="px-4 py-2 rounded-lg hover:bg-slate-100">
                        Kategori
                    </a>

                </div>

            </div>

        </div>

    </nav>

    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-4">
             <div class="bg-green-100 text-green-700 p-4 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @yield('content')

</body>
</html>