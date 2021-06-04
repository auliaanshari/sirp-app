<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "krs";

    protected $fillable = [
        'kelas_id', 
        'user_id', 
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function absensi(){
        return $this->hasMany(Absensi::class);
    }
}
