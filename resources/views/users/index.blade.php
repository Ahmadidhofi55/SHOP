@extends('layout.tables')
@section('title','Users')
@section('dash','Users')
@section('table','User')
@section('header','Dashboard')
@section('aktif','Dashboard')
@section('contend')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-2" >Create </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>image</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                        <tr id="index_{{ $user->id }}">
                            <td>{{ $user->id }} .</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <img src="{{ asset($user->img) }}" class="img-circle" width="100px" alt="user-img">
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $user->id }}"
                                    class="btn btn-success btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $user->id }}"
                                    class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                                <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $user->id }}"
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection
