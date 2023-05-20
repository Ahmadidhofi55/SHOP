<?php

namespace App\Http\Controllers;

use App\Models\merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merek = merek::paginate();
        return view('merek.index',compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremerekRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nm_merek' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('img')->store('public/img');
        $image = str_replace('public/', 'storage/', $image);

       $merek = merek::create([
           'nm_merek' => $request->nm_merek,
           'img' => $image,
       ]);

       if($merek){
           Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
          return redirect()->route('merek.index');
       }else{
           Alert::error('Error', 'Data Gagal Ditambahkan');
         return redirect()->route('merek.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(merek $merek)
    {
        return view('merek.show',compact('merek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit(merek $merek)
    {
        return view('merek.edit',compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemerekRequest  $request
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, merek $merek)
    {
        $this->validate($request,[
            'nm_merek' => 'required|string',
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/', 'storage/', $image);

            Storage::delete(str_replace('storage/', 'public/', $merek->img));

            $merek->update([
                'nm_merek' => $request->nm_merek,
                'img' => $image,
                ]);
                Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
               return redirect()->route('merek.index');

        } else {
            $merek->update([
                'nm_merek' => $request->nm_merek,
            ]);
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
          return redirect()->route('merek.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(merek $merek)
    {
        if ($merek->img) {
            Storage::delete(str_replace('storage/', 'public/', $merek->img));
            $merek->save();
            $merek->delete();
            return redirect()->route('merek.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
