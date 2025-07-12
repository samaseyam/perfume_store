<?php

namespace App\Http\Controllers;

use App\Models\Perfume;

class HomeController extends Controller
{
    public function index()
    {
        $perfumes = Perfume::all();

        return view('home', compact('perfumes'));
    }
}
