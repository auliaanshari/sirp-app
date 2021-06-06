<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "absensi";

    protected $fillable = [
        'krs_id', 
        'pertemuan_id',
        'jam_masuk',
        'jam_keluar',
        'durasi',
        'file',
    ];

    public function krs(){
        return $this->belongsTo(KRS::class);
    }

    public function pertemuan(){
        return $this->belongsTo(Pertemuan::class);
    }
}
