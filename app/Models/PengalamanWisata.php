<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanWisata extends Model
{
    use HasFactory;
    protected $table = 'pengalaman_wisata';
    protected $primaryKey = 'id_pengalaman';
}
