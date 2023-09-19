@extends('template.app')

@section('title', 'Edit data penyakit')

@section('pagetitle', 'Edit data Penyakit')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <button onclick="window.location='{{ route('penyakit.index') }}'" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i></button>
                </div>
                <div class="card-body">
                    <form action="{{ route('penyakit.update', $penyakit->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="namapenyakit">Nama penyakit</label>
                            <input type="text" name="namapenyakit" id="namapenyakit" class="form-control" value="{{ $penyakit->namapenyakit }}">
                        </div>
                        <div class="form-group">
                            <label for="detailpenyakit">Detail penyakit</label>
                            <textarea name="detailpenyakit" id="detailpenyakit" class="form-control">{{ $penyakit->detailpenyakit }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="solusi">Solusi</label>
                            <textarea name="solusi" id="solusi" class="form-control">{{ $penyakit->solusi }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary form-control">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection