@extends('layout.admin')
@section('title','Wallet edit')
@section('dash','Wallet edit')
@section('table','Wallet edit')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('wallet.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                <form action="{{ route('wallet.update',$wallet->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="font-weight-bold">Wallet</label>
                        <input id="nm_metode" value="{{  old('nm_metode', $wallet->nm_metode)  }}" type="text" class="form-control @error('nm_metode') is-invalid @enderror" name="nm_metode" placeholder="Masukkan Wallet">
                        <!-- error message untuk nama -->
                        @error('nm_metode')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <input value="{{ asset( old('img', $wallet->img)) }}" type="file" id="img" class="form-control  @error('img') is-invalid @enderror" name="img">
                        <img src="{{ asset($wallet->img) }}" class="img-circle" width="100px" alt="img">
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
