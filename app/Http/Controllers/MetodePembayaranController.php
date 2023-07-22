<?php

namespace App\Http\Controllers;

use App\Models\metode_pembayaran;
use App\Http\Requests\Updatemetode_pembayaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = metode_pembayaran::paginate();
        return view('wallet.index',compact('wallet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storemetode_pembayaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'metode' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('img')->store('public/img');
        $image = str_replace('public/','storage/',$image);

        $wallet = metode_pembayaran::create([
            'metode' => $request->metode,
            'img' => $image,
        ]);

        if ($wallet) {
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('wallet.index');
        } else {
            Alert::error('error', 'Data Gagal Ditambahkan');
            return redirect()->route('wallet.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\metode_pembayaran  $metode_pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(metode_pembayaran $wallet)
    {
        return view('wallet.show',compact('wallet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\metode_pembayaran  $metode_pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(metode_pembayaran $wallet)
    {
        return view('wallet.edit',compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemetode_pembayaranRequest  $request
     * @param  \App\Models\metode_pembayaran  $metode_pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, metode_pembayaran $wallet)
    {
        $this->validate($request,[
            'metode' => 'required|string',
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/', 'storage/', $image);

            Storage::delete(str_replace('storage/', 'public/', $wallet->img));

            $wallet->update([
                'metode' => $request->metode,
                'img' => $image,
                ]);
                Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
               return redirect()->route('wallet.index');

        } else {
            $wallet->update([
                'metode' => $request->metode,
            ]);
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
          return redirect()->route('wallet.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\metode_pembayaran  $metode_pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(metode_pembayaran $wallet)
    {
        if ($wallet->img) {
            Storage::delete(str_replace('storage/', 'public/', $wallet->img));
            $wallet->save();
            $wallet->delete();
            return redirect()->route('wallet.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
