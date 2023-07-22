@extends('layout.admin')
@section('title','Kategori Show')
@section('dash','Kategori Show')
@section('table','Kategori Show')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('kategori.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    <div class="form-group">
                        <label class="font-weight-bold">Kategori</label>
                        <input  type="text" class="form-control " name="kategori" value="{{ $kategori->kategori }}" id="kategori" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <br>
                         <img src="{{ asset($kategori->img) }}" class="img-circle" width="100px" alt="img">
                    </div>
            </div>
        </div>
    </div>
@endsection
