@extends('layout.admin')
@section('title','User Show')
@section('dash','User Show')
@section('table','User Show')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input  type="text" class="form-control " name="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <br>
                         <img src="{{ asset($user->img) }}" class="img-circle" width="100px" alt="img">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Akses</label>
                        <input id="akses" type="text" class="form-control" name="akses" value="{{ $user->is_admin }}" readonly>
                    </div>

                      <div class="form-group">
                        <label class="font-weight-bold">Password</label>
                        <input type="text" class="form-control " name="password" id="password" value="{{ $user->password }}" readonly>
                    </div>
@endsection
