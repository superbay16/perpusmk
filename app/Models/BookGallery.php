<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGallery extends Model
{
    
 protected $fillable = [
        'foto', 'books_id'
    ];

    protected $hidden = [

    ];

    public function book(){
        return $this->belongsTo(Book::class, 'books_id', 'id');
    }
}
