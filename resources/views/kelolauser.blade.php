@extends('template.app')

@section('title'.'kelola user')

@section('pagetitle', 'Kelola user')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('tambah.user') }}" class="btn btn-outline-primary mb-1"><i class="fa fa-plus">Tambah data user</i></a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table text-center d-block">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal lahir</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @foreach ($user as $u)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->alamat }}</td>
                                    <td>{{ $u->tgllahir }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->password }}</td>
                                    <td>{{ $u->role }}</td>
                                    <td>
                                        <a href="{{ route('edit.user',$u->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete.user', $u->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
@endsection