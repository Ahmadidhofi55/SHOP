@extends('layout.tables')
@section('title','Produk')
@section('dash','Produk')
@section('table','Produk ')
@section('header','Dashboard')
@section('aktif','Dashboard')
@section('contend')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('produk.create') }}" class="btn btn-primary mb-2" >Create </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nm_produk</th>
                            <th>image</th>
                            <th>Merek</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $produk as $produk )
                        <tr>
                            <td>{{ $loop->iteration }} .</td>
                            <td>{{ $produk->nm_produk }}</td>
                            <td>
                                <img src="{{  asset($produk->img) }}" class="img-circle" width="100px" alt="user-img">
                            </td>
                            <td>{{ $produk->merek }}</td>
                            <td>{{ $produk->kategori }}</td>
                            <td>{{ $produk->deskripsi }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                    <a href="{{ route('produk.show',$produk->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Produk belum Tersedia.
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
