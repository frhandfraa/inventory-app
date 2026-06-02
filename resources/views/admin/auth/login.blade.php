<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-2xl shadow w-full max-w-md">

    <h1 class="text-2xl font-bold text-center">
        Admin Login
    </h1>

    <form method="POST" action="/admin/login" class="mt-6">
        @csrf

        <input type="email" name="email" placeholder="Email"
               class="w-full mb-3 p-3 border rounded-xl">

        <input type="password" name="password" placeholder="Password"
               class="w-full mb-3 p-3 border rounded-xl">

        <button class="w-full bg-indigo-600 text-white py-3 rounded-xl">
            Login Admin
        </button>
    </form>

</div>

</body>
</html>