<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPeminjamanController extends Controller
{
     public function index(){
        $user = Auth::user();

        $dipinjam = TransactionDetail::with(['transaction.user', 'book.galleries'])
                                    ->whereHas('transaction', function ($transaction) {
                                        $transaction
                                            ->where('users_id', Auth::user()->id)
                                            ->where('status', 'Dipinjam'); 
                                    })
                                    ->orderBy('created_at', 'desc');
        $selesai = TransactionDetail::with(['transaction.user', 'book.galleries'])
                                    ->whereHas('transaction', function ($transaction) {
                                        $transaction
                                            ->where('users_id', Auth::user()->id)
                                            ->where('status', 'selesai'); 
                                    })
                                    ->orderBy('created_at', 'desc');


                        
       
        return view('pages.dashboard-peminjaman', [
            'transaction_data' => $dipinjam->get(),
            'selesai' => $selesai->get(),
           
        ]);
    }
     public function detail($id){
         $transactionDetail = TransactionDetail::with(['book', 'transaction.user'])
        ->where('id', $id)
        ->first();

         return view('pages.dashboard-peminjaman-detail', [
        'transactionDetail' => $transactionDetail,
    ]);


    }
}
