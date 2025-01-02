<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penerbit extends Model
{
    
    use SoftDeletes;
    
   
    protected $fillable = ['nama_penerbit', 'foto', 'slug'];

    protected $hidden = [];
}
