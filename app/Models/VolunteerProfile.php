<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'sub_judul',
        'deskripsi',
        'visi',
        'misi',
        'alamat',
        'email',
        'telepon',
    ];
}