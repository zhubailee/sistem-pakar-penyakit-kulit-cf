@extends('template.app')

@section('title'.'edit user')

@section('pagetitle', 'edit user')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-danger" onclick="window.location='{{ route('kelola.user') }}'"><i class="fa fa-arrow-left"></i></button>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.user',$user->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Addres</label>
                                <input type="text" class="form-control" placeholder="alamat" name="alamat" id="alamat" value="{{ $user->alamat }}">
                            </div>
                            <div class="form-group">
                                <label for="tgllahir">Birth</label>
                                <input type="date" class="form-control" placeholder="tgllahir" name="tgllahir" id="tgllahir" value="{{ $user->tgllahir }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="{{ $user->password }}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 form-control">Edit Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection