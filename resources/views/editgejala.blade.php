@extends('template.app')

@section('title','Kelola data gejala')

@section('pagetitle','Data gejala')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <button onclick="window.location='{{ route('gejala.index') }}'" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i></button>
                </div>
                <div class="card-body">
                    <form action="{{ route('gejala.update', $gejala->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="namagejala">Nama Gejala</label>
                            <input type="text" class="form-control" id="namagejala" name="namagejala" value="{{ $gejala->namagejala }}"> 
                        </div>
                        <button type="submit" class="btn btn-outline-primary form-control">Edit data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection