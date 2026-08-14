<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Memory;

class MemoryController extends Controller
{
    public function index(Request $request)
        {
            $query = Memory::query();

            // 1. Cek apakah ada filter tanggal dari request
            if ($request->has('tanggal') && $request->tanggal != '') {
                $query->whereDate('tanggal', $request->tanggal);
            }

            // 2. Ambil data dengan urutan tanggal terbaru + pagination (9 item per halaman)
            $memories = $query->latest('tanggal')->paginate(9)->withQueryString();

            return view('memories.index', compact('memories'));
        }

        public function show(Memory $memory)
        {
            return view('memories.show', compact('memory'));
        }
}