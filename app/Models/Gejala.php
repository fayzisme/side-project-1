<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejalas';
    protected $guard = [
        'id'
    ];

    protected $fillable = [
        "kode_gejala", "nama_gejala"
    ];

    public function penilaians() {
        
        return $this->hasMany(Penilaian::class, 'id_gejala');
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['request']['search'] ?? false, function ($query, $value) {
            return $query->where('nama_gejala','like', '%'. $value .'%')->orWhere('kode_gejala','like', '%'. $value .'%');
        });
    }

}
