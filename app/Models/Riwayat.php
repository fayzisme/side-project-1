<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayats';

    protected $guard = ["id"];
    protected $fillable = ["nama_riwayat", "alamat_riwayat", "umur_riwayat", "hasil_riwayat", "nilai_riwayat"];
}
