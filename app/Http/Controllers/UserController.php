<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = User::latest()->get();
         return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email',
            'is_admin' => 'required',
            'password' => 'required|min:4'
        ]);

        $image = $request->file('img')->store('public/img');
        $image = str_replace('public/', 'storage/', $image);

       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'img' => $image,
           'password' => Hash::make($request->password),
       ]);

       if($user){
           Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
          return redirect()->route('user.index');
       }else{
           Alert::error('Erro', 'Data Gagal Ditambahkan');
         return redirect()->route('user.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email',
            'is_admin' => 'required',
            'password' => 'required|min:4'
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/', 'storage/', $image);

            Storage::delete(str_replace('storage/', 'public/', $user->img));

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
                'is_admin'=> $request->is_admin,
                'img' => $image,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
                'is_admin'=> $request->is_admin,
            ]);
        }

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->img) {
            Storage::delete(str_replace('storage/', 'public/', $user->img));
            $user->save();
            $user->delete();
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
