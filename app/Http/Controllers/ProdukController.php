<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use App\Models\merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $produk = produk::paginate();
       return view('produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $merek = merek::paginate();
       $kategori = kategori::paginate();
       return view('produk.create',compact('merek','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprodukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nm_produk' => 'required|string',
            'merek' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'required',
            'harga' => 'required|integer'
        ]);

        $image = $request->file('img')->store('public/img');
        $image = str_replace('public/', 'storage/', $image);

        $produk = produk::create([
            'nm_produk' => $request->nm_produk,
            'img' => $image,
            'merek' => $request->merek,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ]);

        if ($produk) {
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('produk.index');
        } else {
            Alert::error('Error', 'Data Gagal Ditambahkan');
            return redirect()->route('produk.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
       return view('produk.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit( produk $produk)
    {
        return view('produk.edit',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprodukRequest  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk $produk)
    {
        $this->validate($request,[
            'nm_produk' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'merek' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'required',
            'harga' => 'required|integer'
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/', 'storage/', $image);

            Storage::delete(str_replace('storage/', 'public/', $produk->img));

            $produk->update([
                'nm_produk' => $request->name,
                'merek' => $request->merek,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'img' => $image,
            ]);
        } else {
            $produk->update([
                'nm_produk' => $request->name,
                'merek' => $request->merek,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
            ]);
        }

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk)
    {
        if ($produk->img) {
            Storage::delete(str_replace('storage/', 'public/', $produk->img));
            $produk->save();
            $produk->delete();
            Alert::success('Berhasil', 'Data Berhasil Dihapus');
            return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
