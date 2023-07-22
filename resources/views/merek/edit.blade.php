@extends('layout.admin')
@section('title','Merek edit')
@section('dash','Merek edit')
@section('table','Merek edit')

@section('contend')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('merek.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                <form action="{{ route('merek.update',$merek->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="font-weight-bold">Merek</label>
                        <input id="merek" value="{{  old('merek', $merek->merek)  }}" type="text" class="form-control @error('merek') is-invalid @enderror" name="merek" placeholder="Masukkan Merek">
                        <!-- error message untuk nama -->
                        @error('merek')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <input value="{{ asset( old('img', $merek->img)) }}" type="file" id="img" class="form-control  @error('img') is-invalid @enderror" name="img">
                        <img src="{{ asset($merek->img) }}" class="img-circle" width="100px" alt="img">
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
