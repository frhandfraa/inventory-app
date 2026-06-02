<nav class="bg-white shadow px-6 py-4 flex justify-between">

    <a href="/" class="font-bold text-lg">
        MegaMarket
    </a>

    <div class="flex gap-4 items-center">

        {{-- USER --}}
        <div class="relative group">
            <button class="px-3 py-2 bg-green-600 text-white rounded">
                User
            </button>

            <div class="absolute hidden group-hover:block bg-white shadow mt-2 w-40">
                <a href="{{ route('user.login') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Login
                </a>
                <a href="{{ route('user.register') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Register
                </a>
            </div>
        </div>

        {{-- ADMIN --}}
        <div class="relative group">
            <button class="px-3 py-2 bg-indigo-600 text-white rounded">
                Admin
            </button>

            <div class="absolute hidden group-hover:block bg-white shadow mt-2 w-40">
                <a href="{{ route('admin.auth.login') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Login
                </a>
                <a href="{{ route('admin.auth.register') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Register
                </a>
            </div>
        </div>

    </div>

</nav>