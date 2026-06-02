<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'totalProduk' => Product::count(),
            'totalKategori' => Category::count(),
            'produkTersedia' => Product::where('status', 'tersedia')->count(),
            'produkHabis' => Product::where('status', 'habis')->count(),
        ]);
    }
}