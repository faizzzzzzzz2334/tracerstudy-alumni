<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'persyaratan',
        'lokasi',
        'kontak',
        'deskripsi',
        'poster',
        '_token',
    ];
}
