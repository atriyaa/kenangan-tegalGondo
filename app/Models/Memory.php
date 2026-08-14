<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_path',
        'media_type',
        'caption',
        'tanggal',
        'tempat',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}