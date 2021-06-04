<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "pertemuan";

    protected $fillable = [
        'kelas_id', 
        'pertemuan_ke',
        'tanggal', 
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function absensi(){
        return $this->hasMany(Absensi::class);
    }
}
