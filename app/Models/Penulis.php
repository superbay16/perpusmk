<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penulis extends Model
{
    use SoftDeletes;
    
   
    protected $fillable = ['nama_penulis', 'foto', 'slug'];

    protected $hidden = [];
}
