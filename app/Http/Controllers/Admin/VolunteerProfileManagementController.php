<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerProfile;
use Illuminate\Http\Request;

class VolunteerProfileManagementController extends Controller
{
    public function edit()
    {
        $profile = VolunteerProfile::firstOrCreate(['id' => 1], [
            'judul' => 'Volunteer Desa Tegalgondo',
            'sub_judul' => 'Membangun Desa, Menginspirasi Bangsa',
            'deskripsi' => 'Deskripsi profil volunteer desa...',
        ]);

        return view('admin.volunteer_profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = VolunteerProfile::firstOrFail();

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string',
        ]);

        $profile->update($validated);

        return redirect()->back()->with('success', 'Profil Volunteer berhasil diperbarui!');
    }
}