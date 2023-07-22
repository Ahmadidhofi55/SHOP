@extends('layout.admin')
@section('title','Produk Create')
@section('dash','Produk Create')
@section('table','Produk Create')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('produk.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">nm_produk</label>
                        <input  type="text" class="form-control @error('nm_produk') is-invalid @enderror" id="nm_produk" name="nm_produk" value="{{ old('nm_produk') }}" placeholder="Masukkan Produk">

                        <!-- error message untuk nama -->
                        @error('nm_produk')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <input type="file" id="img" class="form-control  @error('img') is-invalid @enderror" name="img">

                        <!-- error message untuk image -->
                        @error('img')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nerek</label>
                        <select name="merek" id="merek" class="form-control select2" style="width: 100%;">
                            @foreach ($merek as $merek)
                            <option value="{{ $merek->merek }}" {{ $merek->id == $merek->id ? 'selected' : '' }}>{{ $merek->merek }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" id="kategori" class="form-control select2" style="width: 100%;">
                            @foreach ($kategori as $kategori)
                            <option  value="{{ $kategori->kategori }}" {{ $kategori->id == $kategori->id ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi</label>
                        <input  type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi">

                        <!-- error message untuk nama -->
                        @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Harga</label>
                        <input  type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga">

                        <!-- error message untuk nama -->
                        @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-danger">RESET</button>
                </form>
@endsection
