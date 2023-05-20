@extends('layout.tables')
@section('title','Order')
@section('dash','Order')
@section('table','Order')
@section('header','Dashboard')
@section('aktif','Dashboard')
@section('contend')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pengiriman</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $order as $order )
                        <tr>
                            <td>{{ $loop->iteration }} .</td>
                            <td>{{ $order->status_pembayaran }}</td>
                            <td>{{ $order->status_pengiriman }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('order.destroy', $order->id) }}" method="POST">
                                    <a href="{{ route('order.show',$order->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('order.edit', $produk->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Order belum Tersedia.
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
