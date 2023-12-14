<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;

    protected $table = "anggota"; 
    protected $primaryKey = "id_anggota";
    protected $fillable = ['id_anggota', 'nim', 'nama_anggota', 'prodi', 'hp'];
    public $timestamps = true; 
}
