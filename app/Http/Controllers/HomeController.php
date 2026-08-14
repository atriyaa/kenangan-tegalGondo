<?php

namespace App\Http\Controllers;

use App\Models\Memory;

class HomeController extends Controller
{
    public function index()
    {
        // Maksimal 6 memory terbaru
        $latestMemories = Memory::latest('tanggal')->take(6)->get();
        return view('home', compact('latestMemories'));
    }
}