<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakits';
    protected $guard = [
        'id'
    ];

    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit'
    ];

    public function penilaians() {
        
        return $this->hasMany(Penilaian::class, 'id_penyakit');
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['request']['search'] ?? false, function ($query, $value) {
            return $query->where('nama_penyakit','like', '%'. $value .'%')->orWhere('kode_penyakit','like', '%'. $value .'%');
        });
    }
}
