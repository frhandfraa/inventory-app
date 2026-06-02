@extends('layouts.main')

@section('content')

<div class="max-w-xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-6">
            Profil Pengguna
        </h1>

        <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>

        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

        <p><strong>Role:</strong> {{ auth()->user()->role }}</p>

    </div>

</div>

@endsection