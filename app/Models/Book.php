<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
     use SoftDeletes;


    protected $fillable = [
        'isbn', 'judul', 'penulis_id', 'penerbits_id', 'categories_id', 'tahun_terbit', 'bahasa', 'halaman', 'deskripsi', 'pdf', 'slug'

    ];


    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(BookGallery::class, 'books_id', 'id');
    }

    public function penulis(){
        return $this->belongsTo(Penulis::class, 'penulis_id', 'id');
    }
    public function penerbit(){
        return $this->belongsTo(Penerbit::class, 'penerbits_id', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
