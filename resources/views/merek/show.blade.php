@extends('layout.admin')
@section('title','Merek Show')
@section('dash','Merek Show')
@section('table','Merek Show')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('merek.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    <div class="form-group">
                        <label class="font-weight-bold">Merek</label>
                        <input  type="text" class="form-control " name="merek" value="{{ $merek->merek }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <br>
                         <img src="{{ asset($merek->img) }}" class="img-circle" width="100px" alt="img">
                    </div>
            </div>
        </div>
    </div>
@endsection
