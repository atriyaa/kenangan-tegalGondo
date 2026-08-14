<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoryRequest;
use App\Http\Requests\UpdateMemoryRequest;
use App\Models\Memory;
use Illuminate\Support\Facades\Storage;

class MemoryManagementController extends Controller
{
    public function index()
    {
        $memories = Memory::latest('tanggal')->paginate(10);
        return view('admin.memories.index', compact('memories'));
    }

    public function create()
    {
        return view('admin.memories.create');
    }

public function store(StoreMemoryRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('media')) {
        $file = $request->file('media');
        $path = $file->store('memories', 'public');
        
        // Cek ekstensi file (dukungan: jpg, jpeg, png, webp, heic, mp4, mov)
        $extension = strtolower($file->getClientOriginalExtension());
        $isVideo = in_array($extension, ['mp4', 'mov']);

        $data['media_path'] = $path;
        $data['media_type'] = $isVideo ? 'video' : 'image';
    }

    Memory::create($data);

    return redirect()->route('admin.memories.index')
        ->with('success', 'Kenangan berhasil ditambahkan!');
}

public function update(UpdateMemoryRequest $request, Memory $memory)
{
    $data = $request->validated();

    if ($request->hasFile('media')) {
        // Hapus berkas media lama dari storage jika ada
        if ($memory->media_path && Storage::disk('public')->exists($memory->media_path)) {
            Storage::disk('public')->delete($memory->media_path);
        }

        // Simpan berkas media baru
        $file = $request->file('media');
        $path = $file->store('memories', 'public');
        
        $extension = strtolower($file->getClientOriginalExtension());
        $isVideo = in_array($extension, ['mp4', 'mov']);

        $data['media_path'] = $path;
        $data['media_type'] = $isVideo ? 'video' : 'image';
    }

    $memory->update($data);

    return redirect()->route('admin.memories.index')
        ->with('success', 'Kenangan berhasil diperbarui!');
}

    public function edit(Memory $memory)
    {
        return view('admin.memories.edit', compact('memory'));
    }

    public function destroy(Memory $memory)
    {
        // Hapus file fisik dari storage
        if ($memory->media_path && Storage::disk('public')->exists($memory->media_path)) {
            Storage::disk('public')->delete($memory->media_path);
        }

        // Hapus data dari database
        $memory->delete();

        return redirect()->route('admin.memories.index')
            ->with('success', 'Kenangan berhasil dihapus!');
    }
}