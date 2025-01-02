<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest as AdminBookRequest;
use App\Models\Book;
use App\Models\BookGallery;
use App\Models\Category;
use App\Models\Penerbit;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if (request()->ajax()) {
        $query = Book::with(['penulis', 'penerbit', 'category']);

        return Datatables::of($query)
            ->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                type="button" id="action' .  $item->id . '"
                                    data-toggle="dropdown" 
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                <a class="dropdown-item" href="' . route('book.edit', $item->id) . '">
                                    Sunting
                                </a>
                                <form action="' . route('book.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>';
            })
                ->editColumn('pdf', function ($item) {
                    if ($item->pdf) {
                        return '<a href="' . Storage::url($item->pdf) . '" target="_blank" class="btn btn-danger btn-sm">
                                    <i class="bi bi-file-earmark-font-fill"></i> Lihat Buku
                                </a>';
                    } else {
                        return 'Tidak ada PDF';
                    }
                })
                ->rawColumns(['action', 'pdf'])
                ->make();

    }
    return view('pages.admin.book.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $penulis = Penulis::all();
        $categories = Category::all();
        $penerbits = Penerbit::all();        
        return view('pages.admin.book.create',[
            'penulis' => $penulis,
            'penerbits' => $penerbits,
            'categories' => $categories,
        ]);

    

    }
     public function uploadGallery(Request $request){
        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('assets/book', 'public');
        BookGallery::create($data);

        return redirect()->route('book.edit', $request->books_id);
    }

     public function deleteGallery(Request $request, $id)
    {
        $item = BookGallery::findorFail($id);
        $item->delete();

        return redirect()->route('book.edit', $item->books_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminBookRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['pdf'] = $request->file('pdf')->store('assets/book', 'public');

         $book = Book::create($data);

          $gallery = [
            'books_id' => $book->id,
            'foto' => $request->file('foto')->store('assets/book', 'public')
            ];
            BookGallery::create($gallery);



         return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Book::with(['penulis', 'penerbit', 'category', 'galleries'])->findOrFail($id);
        $penulis = Penulis::all();
        $categories = Category::all();
        $penerbits = Penerbit::all();
         return view('pages.admin.book.edit',[
            'item' => $item,
            'penulis' => $penulis,
            'penerbits' => $penerbits,
            'categories' => $categories,
        ]);    

    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminBookRequest $request, string $id)
    {
        $data = $request->all();

        $item = Book::findOrFail($id);

        $data['slug'] = Str::slug($request->judul);

        
        // Cek apakah ada file pdf yang dikirim
        if ($request->hasFile('pdf')) {
            // Hapus pdf yang pdf jika ada
            if ($item->pdf) {
                Storage::disk('public')->delete($item->pdf);
            }

        // Simpan file yang baru
        $data['pdf'] = $request->file('pdf')->store('assets/book', 'public');
        }


        $item->update($data);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Book::findorFail($id);
        $item->delete();

        return redirect()->route('book.index');
    }
}
