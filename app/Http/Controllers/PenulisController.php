<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
     public function index(){
         $penulis = Penulis::all();
        return view('pages.penulis', [
            'penulis' => $penulis
        ]);
    }
}
