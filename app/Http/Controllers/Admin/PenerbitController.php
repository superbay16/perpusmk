<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenerbitRequest;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Str;
class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Penerbit::query();

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
                                    <a class="dropdown-item" href="' . route('penerbit.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('penerbit.destroy', $item->id) . '" method="POST">
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
        return view ('pages.admin.penerbit.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenerbitRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->nama_penerbit);
        $data['foto'] = $request->file('foto')->store('assets/penerbit', 'public');
      
        penerbit::create($data);

        return redirect()->route('penerbit.index');
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
        $item = Penerbit::findOrFail($id);

        return view('pages.admin.penerbit.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Penerbit::findOrFail($id);
        $data = $request->all();

        $data['slug'] = Str::slug($request->nama_penerbit);

        if ($request->hasFile('foto')) {
            if ($item->foto) {
                Storage::disk('public')->delete($item->foto);
            }
            $data['foto'] = $request->file('foto')->store('assets/penerbit', 'public');
        } else {
            $data['foto'] = $item->foto;
        }

        $item->update($data);

        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Penerbit::findorFail($id);
        $item->delete();

        return redirect()->route('penerbit.index');
    }
}
