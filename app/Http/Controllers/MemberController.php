<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('urutan', 'asc')->get();
        return view('anggota', compact('members'));
    }
}