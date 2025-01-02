<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
     public function index(){
         $penerbit = Penerbit::all();
        return view('pages.penerbit', [
            'penerbit' => $penerbit
        ]);
    }
}
