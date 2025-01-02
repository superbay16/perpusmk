<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['transactions_id', 'books_id', 'code'];

    protected $hidden = [];

    public function book(){
        return $this->hasOne( Book::class, 'id', 'books_id' );
    }

    public function transaction(){
        return $this->hasOne( Transaction::class, 'id', 'transactions_id' );
    }
}

