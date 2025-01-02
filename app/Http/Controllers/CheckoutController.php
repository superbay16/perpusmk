<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class CheckoutController extends Controller
{
    public function process(Request $request){
        $user = Auth::user();
        $user->update($request->all());

        $code = 'PNJM-' . mt_rand(0000,9999);
        $carts = Cart::with(['book', 'user'])
                    ->where('users_id', Auth::user()->id)
                        ->get();
        
        $tanggalPinjam = now();
         $tanggalKembali = now()->addDays(3);

        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'tanggal_pinjam' => $tanggalPinjam,
            'tanggal_kembali' => $tanggalKembali,
            'status' => 'dipinjam',
            'code' => $code
        ]);

          foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000,9999);

              TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'books_id' => $cart->book->id,
                'code' => $trx
                ]);
            }

         Cart::where('users_id', Auth::user()->id)->delete();

            return redirect()->route('success');
    }
    
    
}
