@extends('layout.admin')
@section('title','Wallet Create')
@section('dash','Wallet Create')
@section('table','Wallet Create')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('wallet.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                <form action="{{ route('wallet.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Wallet</label>
                        <input  type="text" class="form-control @error('nm_metode') is-invalid @enderror" id="nm_metode" name="nm_metode" value="{{ old('nm_metode') }}" placeholder="Masukkan Wallet">
                        <!-- error message untuk nama -->
                        @error('nm_metode')
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

                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-danger">RESET</button>
                </form>
@endsection
