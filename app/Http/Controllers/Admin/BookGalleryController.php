<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookGalleryRequest;
use App\Models\Book;
use App\Models\BookGallery;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BookGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if (request()->ajax()) {
            $query = BookGallery::with(['book']);

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
                                    <form action="' . route('book-gallery.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->editColumn('foto', function ($item) {
                    return $item->foto ? '<img src="' . Storage::url($item->foto) . '" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action','foto'])
                ->make();
        }

        return view('pages.admin.book-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        
        return view('pages.admin.book-gallery.create',[
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookGalleryRequest $request)
    {
        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('assets/book', 'public');

        BookGallery::create($data);

        return redirect()->route('book-gallery.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = BookGallery::findorFail($id);
        $item->delete();

        return redirect()->route('book-gallery.index');

    }
}
