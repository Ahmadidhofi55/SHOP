@extends('layout.admin')
@section('title','Wallet Show')
@section('dash','Wallet Show')
@section('table','Wallet Show')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('wallet.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    <div class="form-group">
                        <label class="font-weight-bold">Wallet</label>
                        <input  type="text" class="form-control " name="name" value="{{ $wallet->nm_metode }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <br>
                         <img src="{{ asset($wallet->img) }}" class="img-circle" width="100px" alt="img">
                    </div>
            </div>
        </div>
    </div>
@endsection
