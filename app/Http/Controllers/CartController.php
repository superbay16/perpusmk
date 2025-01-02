<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
     public function index(){
       $carts = Cart::with(['book.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        
        return view('pages.cart',[
            'carts' => $carts
        ]);
    }
    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart')->with('success', 'buku berhasil dihapus');
    }
     public function success(){
        return view('pages.success');
    }
}
