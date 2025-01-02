<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
         if (request()->ajax()) {
            $query = Category::query();

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
                                    <a class="dropdown-item" href="' . route('category.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('category.destroy', $item->id) . '" method="POST">
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
                    return $item->foto ? '<img src="' . Storage::url($item->foto) . '" style="max-height: 40px;"/>' : '';
                })
                ->rawColumns(['action', 'foto'])
                ->make();
        }
        return view ('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
       
        $data = $request->all();

        $data['slug'] = Str::slug($request->nama);
        $data['foto'] = $request->file('foto')->store('assets/category', 'public');
      
        category::create($data);

        return redirect()->route('category.index');
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
        $item = Category::findOrFail($id);

        return view('pages.admin.category.edit',[
            'item' => $item
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $item = Category::findOrFail($id);
    $data = $request->all();

    $data['slug'] = Str::slug($request->nama);

    // Cek apakah ada file foto yang dikirim
    if ($request->hasFile('foto')) {
        // Hapus foto yang lama jika ada
        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }

        // Simpan foto yang baru
        $data['foto'] = $request->file('foto')->store('assets/category', 'public');
    }

    $item->update($data);

    return redirect()->route('category.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Category::findorFail($id);
        $item->delete();

        return redirect()->route('category.index');
    }
}
