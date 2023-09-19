@extends('template.app')

@section('title', 'Basis pengetahuan Sistem pakar penyakit kulit')

@section('pagetitle', 'Basis pengetahuan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('pengetahuan.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i>Tambah data basis pengetahuan</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama penyakit</th>
                                        <th>Gejala</th>
                                        <th>MB</th>
                                        <th>MD</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no =1
                                    @endphp
                                    @foreach ($pengetahuan as $p)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $p->namapenyakit }}</td>
                                            <td>{{ $p->namagejala }}</td>
                                            <td>{{ $p->mb }}</td>
                                            <td>{{ $p->md }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengetahuan.edit',$p->id) }}" class="btn btn-outline-primary mr-2"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('pengetahuan.destroy',$p->id) }}" method="post">
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
                            {{ $pengetahuan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection