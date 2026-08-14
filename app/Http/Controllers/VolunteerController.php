<?php

namespace App\Http\Controllers;

use App\Models\VolunteerProfile;

class VolunteerController extends Controller
{
    public function index()
    {
        $profile = VolunteerProfile::first();
        return view('profil-volunteer', compact('profile'));
    }
}