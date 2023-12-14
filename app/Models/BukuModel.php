<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = "buku"; // Corrected property name
    protected $primaryKey = "id_buku";
    protected $fillable = ['id_buku', 'judul', 'pengarang', 'kategori'];
    public $timestamps = true; // Assuming you have timestamps in your table
}
