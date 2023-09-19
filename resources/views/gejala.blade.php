@extends('template.app')

@section('title','Kelola data gejala')

@section('pagetitle','Data gejala')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('gejala.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i>Tambah data gejala</a>
                    </div>
                    <div class="card-body text-center">
                        <div class="table table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Gejala</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1
                                    @endphp
                                    @foreach ($gejala as $g)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $g->namagejala }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('gejala.edit',$g->id) }}" class="btn btn-outline-primary mr-2"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('gejala.destroy',$g->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $gejala->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection