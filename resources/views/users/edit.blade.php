@extends('layout.admin')
@section('title','user edit')
@section('dash','user edit')
@section('table','user edit')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input value="{{  old('name', $user->name)  }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama User">

                        <!-- error message untuk nama -->
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <input value="{{ asset( old('img', $user->img)) }}" type="file" id="img" class="form-control  @error('img') is-invalid @enderror" name="img">

                        <!-- error message untuk image -->
                        @error('img')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="email" value="{{  old('email', $user->email)  }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email User">

                        <!-- error message untuk email -->
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Pilih Akses</label>
                        <select class="form-control select2 @error('is_admin') is-invalid @enderror" name="is_admin" id="is-admin" style="width: 100%;">
                          <option  selected="selected">--</option>
                          <option value="0">Admin</option>
                          <option value="1">User</option>
                        </select>
                      </div>

                        <!-- error message untuk password -->
                        @error('is_admin')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                      <div class="form-group">
                        <label class="font-weight-bold">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Masukkan Password">

                        <!-- error message untuk password -->
                        @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-danger">RESET</button>

                </form>
@endsection
