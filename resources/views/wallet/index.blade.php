@extends('layout.tables')
@section('title','Wallet')
@section('dash','Wallet')
@section('table','Wallet')
@section('header','Dashboard')
@section('aktif','Dashboard')
@section('contend')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('wallet.create') }}" class="btn btn-primary mb-2" >Create </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>wallet</th>
                            <th>image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $wallet as $wallet )
                        <tr >
                            <td>{{ $loop->iteration }} .</td>
                            <td>{{ $wallet->metode }}</td>
                            <td>
                                <img src="{{  asset($wallet->img) }}" class="img-circle" width="100px" alt="wallet-img">
                            </td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('wallet.destroy', $wallet->id) }}" method="POST">
                                    <a href="{{ route('wallet.show',$wallet->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('wallet.edit', $wallet->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Wallet belum Tersedia.
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
