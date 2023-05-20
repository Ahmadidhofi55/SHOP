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
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $user as $user )
                        <tr >
                            <td>{{ $loop->iteration }} .</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <img src="{{  asset($user->img) }}" class="img-circle" width="100px" alt="user-img">
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->is_admin }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    <a href="{{ route('user.show',$user->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Post belum Tersedia.
                        </div>
                        @endforelse
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
