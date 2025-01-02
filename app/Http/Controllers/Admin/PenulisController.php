<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenulisRequest;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Penulis::query();

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
                                    <a class="dropdown-item" href="' . route('penulis.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('penulis.destroy', $item->id) . '" method="POST">
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
        return view ('pages.admin.penulis.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenulisRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->nama_penulis);
        $data['foto'] = $request->file('foto')->store('assets/penulis', 'public');
      
        Penulis::create($data);

        return redirect()->route('penulis.index');
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
        $item = Penulis::findOrFail($id);

        return view('pages.admin.penulis.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Penulis::findOrFail($id);
        $data = $request->all();

        $data['slug'] = Str::slug($request->nama_penulis);

        if ($request->hasFile('foto')) {
            if ($item->foto) {
                Storage::disk('public')->delete($item->foto);
            }
            $data['foto'] = $request->file('foto')->store('assets/penulis', 'public');
        } else {
            $data['foto'] = $item->foto;
        }

        $item->update($data);

        return redirect()->route('penulis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Penulis::findorFail($id);
        $item->delete();

        return redirect()->route('penulis.index');
    }
}
