<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-2xl shadow w-full max-w-md">

    <h1 class="text-2xl font-bold text-center">Register</h1>

    <form method="POST" action="{{ route('user.register') }}" class="mt-6">
        @csrf

        <input type="text" name="name" placeholder="Nama"
               class="w-full mb-3 p-3 border rounded-xl">

        <input type="email" name="email" placeholder="Email"
               class="w-full mb-3 p-3 border rounded-xl">

        <input type="password" name="password" placeholder="Password"
               class="w-full mb-3 p-3 border rounded-xl">

        <button class="w-full bg-green-600 text-white py-3 rounded-xl">
            Register
        </button>
        <a href="{{ route('user.login') }}" class="text-blue-600">
    Login
</a>
    </form>

</div>

</body>
</html>