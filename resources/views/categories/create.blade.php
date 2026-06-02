@extends('layouts.main')

@section('content')

<div class="max-w-xl mx-auto py-10">

    <div class="bg-white p-6 rounded-xl shadow">

        <h1 class="text-2xl font-bold mb-4">
            Tambah Kategori
        </h1>

        <form action="{{ route('categories.store') }}" method="POST">

            @csrf

            <div>

                <label>Nama Kategori</label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg p-3 mt-2">

            </div>

            <button
                class="mt-4 bg-blue-600 text-white px-5 py-2 rounded-lg">

                Simpan

            </button>

        </form>

    </div>

</div>

@endsection