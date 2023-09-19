@extends('template.app')

@section('title','Edit data basis pengetahuan sistem pakar penyakit kulit')

@section('pagetitle','Edit data basis pengetahuan')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <button onclick="window.location='{{ route('pengetahuan.index') }}'" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i></button>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengetahuan.update',$peng->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="namapenyakit">Penyakit</label>
                            <select name="namapenyakit" id="namapenyakit" class="form-control">
                                <option value="{{ $peng->idpenyakit }}">{{$peng->namapenyakit}}</option>
                                @foreach ($penyakit as $p)
                                    <option value="{{ $p->id }}">{{ $p->namapenyakit }}</option>
                                @endforeach
                            </select>
                            @if (session('namapenyakit'))
                                <div class="alert alert-danger">{{ $message }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="namagejala">Gejala</label>
                            <select name="namagejala" id="namagejala" class="form-control">
                                <option value="{{ $peng->idgejala }}">{{$peng->namagejala}}</option>
                                @foreach ($gejala as $p)
                                    <option value="{{ $p->id }}">{{ $p->namagejala }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mb">MB</label>
                            <select name="mb" id="mb" class="form-control">
                                <option value="{{ $peng->mb }}">{{$peng->mb}}</option>
                                <option value="0">0</option>
                                @for ($i = 2; $i < 9; $i+=2)
                                <option value="{{ "0.".$i }}">{{ "0.".$i }}</option>
                                @endfor
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="md">MD</label>
                            <select name="md" id="md" class="form-control">
                                <option value="{{$peng->md}}">{{$peng->md}}</option>
                                <option value="0">0</option>
                                @for ($i = 2; $i < 9; $i+=2)
                                <option value="{{ "0.".$i }}">{{ "0.".$i }}</option>
                                @endfor
                                <option value="1">1</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-primary form-control">Edit data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection