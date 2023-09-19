@extends('template.app')

@section('title','Tambah data gejala')

@section('pagetitle','Tambah data gejala')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <button onclick="window.location='{{ route('gejala.index') }}'" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i></button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gejala.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="namagejala">Nama Gejala</label>
                                <input type="text" class="form-control" id="namagejala" name="namagejala"> 
                            </div>
                            <button type="submit" class="btn btn-outline-primary form-control">Tambah data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection