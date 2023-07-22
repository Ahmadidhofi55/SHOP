@extends('layout.admin')
@section('title','Kategori edit')
@section('dash','Kategori edit')
@section('table','Kategori edit')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('kategori.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                <form action="{{ route('kategori.update',$kategori->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="font-weight-bold">Kategori</label>
                        <input id="kategori" value="{{  old('kategori', $kategori->kategori)  }}" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" placeholder="Masukkan Kategori">
                        <!-- error message untuk nama -->
                        @error('kategori')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <input value="{{ asset( old('img', $kategori->img)) }}" type="file" id="img" class="form-control  @error('img') is-invalid @enderror" name="img">
                        <img src="{{ asset($kategori->img) }}" class="img-circle" width="100px" alt="img">
                        <!-- error message untuk image -->
                        @error('img')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                    <button type="reset" class="btn btn-md btn-danger">RESET</button>

                </form>
@endsection
