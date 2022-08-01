<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $guarded = ['id_pengaduan'];

    public function masyarakat()
    {
        return $this->belongsTo(User::class, 'id_masyarakat');
    }
}
