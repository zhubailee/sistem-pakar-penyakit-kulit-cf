@extends('template.app')

@section('title', 'Kelola data penyakit')

@section('pagetitle', 'Data Penyakit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('penyakit.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i>Tambah data penyakit</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama penyakit</th>
                                        <th>Detail penyakit</th>
                                        <th>Solusi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1
                                    @endphp
                                    @foreach ($penyakit as $p)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $p->namapenyakit }}</td>
                                            <td>{{ $p->detailpenyakit }}</td>
                                            <td>{{ $p->solusi}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('penyakit.edit', $p->id) }}" class="btn btn-outline-primary mr-2"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('penyakit.destroy', $p->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection