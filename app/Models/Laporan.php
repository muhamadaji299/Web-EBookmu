<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
   use HasFactory;

   protected $table = 'komentars';
   
   protected $fillable = ['nama','email','pesan'];

   public $timestamps = true;
}
