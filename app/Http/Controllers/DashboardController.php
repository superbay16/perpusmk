<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     public function index(){
        $user = Auth::user();
        
        $transactions = TransactionDetail::with(['transaction.user', 'book.galleries'])
                        ->whereHas('transaction', function ($transaction) {
                            $transaction->where('users_id', Auth::user()->id);
                        })
                         ->orderBy('created_at', 'desc');

        $histori = TransactionDetail::whereHas('transaction', function ($query) {
                                $query->where('users_id', Auth::user()->id);
                            })->count();

                        
        $dipinjam = TransactionDetail::whereHas('transaction', function ($query) {
                             $query->where('users_id', Auth::user()->id)
                                   ->where('status', 'dipinjam');
                                 })->count();

        $selesai = TransactionDetail::whereHas('transaction', function ($query) {
                            $query->where('users_id', Auth::user()->id)
                                  ->where('status', 'selesai');
                                })->count();
       
        return view('pages.dashboard', [
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
            'histori' => $histori,
            'dipinjam' => $dipinjam,
            'selesai' => $selesai,
        ]);
    }
}
