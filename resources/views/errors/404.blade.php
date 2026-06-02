@section('content')

<div class="min-h-screen flex items-center justify-center">

    <div class="text-center">

        <h1 class="text-8xl font-bold text-red-600">
            403
        </h1>

        <p class="text-2xl mt-4">
            Akses Ditolak
        </p>

        <a href="{{ route('admin.home') }}"
           class="mt-6 inline-block bg-blue-600 text-white px-5 py-3 rounded-lg">

            Kembali

        </a>

    </div>

</div>

@endsection