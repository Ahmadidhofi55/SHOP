<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Http\Requests\UpdatekategoriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::paginate();
        return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
             'nm_kategori' => 'required|string',
             'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('img')->store('public/img');
        $image = str_replace('public/','storage/',$image);

        $merek = kategori::create([
            'nm_kategori' => $request->nm_kategori,
            'img' => $image,
        ]);

        if($merek){
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
           return redirect()->route('kategori.index');
        }else{
            Alert::error('Error', 'Data Gagal Ditambahkan');
          return redirect()->route('kategori.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        return view('kategori.show',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekategoriRequest  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        $this->validate($request,[
            'nm_kategori' => 'required|string',
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/', 'storage/', $image);

            Storage::delete(str_replace('storage/', 'public/', $kategori->img));

            $kategori->update([
                'nm_kategori' => $request->nm_kategori,
                'img' => $image,
                ]);
                Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
               return redirect()->route('kategori.index');

        } else {
            $kategori->update([
                'nm_kategori' => $request->nm_kategori,
            ]);
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
          return redirect()->route('kategori.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        if ($kategori->img) {
            Storage::delete(str_replace('storage/', 'public/', $kategori->img));
            $kategori->save();
            $kategori->delete();
            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
