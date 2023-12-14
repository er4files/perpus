<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasModel extends Model
{
    use HasFactory;

    protected $table = "petugas"; // Corrected property name
    protected $primaryKey = "id_petugas";
    protected $fillable = ['id_petugas', 'nama_petugas', 'hp'];
    public $timestamps = true; // Assuming you have timestamps in your table
}
