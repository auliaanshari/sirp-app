<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "kelas";

    protected $fillable = [
        'kode_kelas', 
        'kode_matkul', 
        'nama_matkul', 
        'tahun', 
        'semester', 
        'sks',
    ];

    public function krs(){
        return $this->hasMany(KRS::class);
    }

    public function pertemuan(){
        return $this->hasMany(Pertemuan::class);
    }
}
