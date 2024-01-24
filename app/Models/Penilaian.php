<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaians';
    protected $guard = ["id"];
    protected $fillable = [
        'id_penyakit',
        'id_gejala',
        'bobot_penilaian'
    ];

    public function penyakit() {
        
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }

    public function gejala() {
        
        return $this->belongsTo(Gejala::class, 'id_gejala');
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['request']['search'] ?? false, function ($query, $value) {
            return $query->whereHas('penyakit', function($q) use ($value) {
                return $q->where('nama_penyakit', 'like', '%'. $value .'%')->orWhere('kode_penyakit','like', '%'. $value .'%');
            })->whereHas('gejala', function($q) use ($value) {
                return $q->where('nama_gejala', 'like', '%'. $value .'%')->orWhere('kode_gejala','like', '%'. $value .'%');
            });
        });
    }
}
