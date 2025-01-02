<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardBukuController extends Controller
{
    public function index(){
        $transactions = TransactionDetail::with(['transaction.user', 'book.galleries'])
                        ->whereHas('transaction', function ($transaction) {
                            $transaction->where('users_id', Auth::user()->id)
                             ->where('status', 'dipinjam');;
                        })
                         ->orderBy('created_at', 'desc'); 

        return view('pages.dashboard-buku', [
            'transaction_data' => $transactions->get(),
        ]);
    }
    public function detail($id){
        $book = Book::findOrFail($id);
        return view('pages.dashboard-buku-details', [
            'book' => $book
        ]);
    }
    public function create(){
        return view('pages.dashboard-buku-tambah');
    }

    public function read($id)
{
    $book = Book::findOrFail($id);

    return view('pages.dashboard-buku-baca', [
        'book' => $book
    ]);
}

}
