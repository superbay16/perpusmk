<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class AdminDashboardController extends Controller
{
    public function index(){
        $pengguna = User::count();
        $buku = Book::count();
        $dipinjam = Transaction::where('status', 'dipinjam')->count();
        $selesai = Transaction::where('status', 'selesai')->count();

        $transactions = TransactionDetail::with(['transaction.user', 'book.galleries'])
                        ->orderBy('created_at', 'desc')
                        ->get();


        return view('pages.admin.dashboard', [
            'pengguna' => $pengguna,
            'buku' => $buku,
            'dipinjam' => $dipinjam,
            'selesai' => $selesai,
            'transaction_data' => $transactions
        ]);
    }
}
