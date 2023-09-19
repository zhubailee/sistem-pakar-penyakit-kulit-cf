@extends('template.app')

@section('title','Welcome to sistem pakar penyakit kulit')

@section('pagetitle','Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1><i class="fa fa-hospital-o"></i></h1>
                    </div>
                    <div class="card-body bg-primary text-white">
                        <h3><strong>{{ $penyakit }}</strong></h3>
                        PENYAKIT
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1><i class="fa fa-heartbeat"></i></h1>
                    </div>
                    <div class="card-body bg-success text-white">
                        <h3><strong>{{ $gejala }}</strong></h3>
                        GEJALA
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1><i class="fa fa-database"></i></h1>
                    </div>
                    <div class="card-body bg-warning text-white">
                        <h3><strong>{{ $basis }}</strong></h3>
                        BASIS PENGETAHUAN
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h1><i class="fa fa-user"></i></h1>
                    </div>
                    <div class="card-body bg-info text-white">
                        <h3><strong>{{ $user }}</strong></h3>
                        PENGGUNA
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection