<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberManagementController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'required|integer',
        ], [
            'nama.required' => 'Nama anggota wajib diisi.',
            'jabatan.required' => 'Jabatan/Peran wajib diisi.',
            'urutan.required' => 'Urutan tampil wajib diisi.',
        ]);

        Member::create($validated);

        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'required|integer',
        ]);

        $member->update($validated);

        return redirect()->route('admin.members.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil dihapus!');
    }
}