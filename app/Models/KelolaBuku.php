<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaBuku extends Model
{
    use HasFactory;

    protected $table = 'kelola_bukus';

    protected $fillable = ['judul','deskripsi','cover','file'];
    
}
