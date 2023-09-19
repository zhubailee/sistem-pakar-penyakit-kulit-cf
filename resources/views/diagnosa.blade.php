@extends('template.app')


@section('title', 'Selamat datang dihalaman diagnosa penyakit kuli')

@section('pagetitle','Diagnosa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="card">
                @if (session('pesan'))
                    <div class="alert alert-danger mt-3">{{ session('pesan') }}</div>
                @endif
                <div class="card-body">
                    <form action="{{ route('diagnosa.process') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gejala</th>
                                        <th>Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1
                                    @endphp
                                    @foreach ($gejala as $g)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><label for="{{ $g->id }}">{{ $g->namagejala }}</label></td>
                                        <td>
                                            <select name="kondisi[]" id="{{ $g->id }}" class="form-control">
                                                <option value="0">--Pilih kondisi--</option>
                                                @foreach ($kondisi as $k)
                                                <option data-id="{{ $k->id }}" value="{{ $g->id.'_'.$k->id }}">{{ $k->kondisi }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-outline-primary" name="cek">Cek</button>
                        </div>
                        {{-- @dd(is_array(session('nilai'))) --}}
                        @if (session('nilai') != null)
                            <div class="alert alert-success mt-3">
                                <h3>Kemungkinan besar:</h3>
                                <p>{{ session('namapenyakit')[1] . '/' . round(session('nilai')[1] * 100, 2) . '% dengan nilai ' . round(session('nilai')[1], 4) }}</p>
                            </div>
                        @endif
                        @if (is_array(session('nilai')) == true)
                            <div class="alert alert-danger mt-3">
                                <h3>Kemungkinan lainnya:</h3>
                                {{-- @dd(count(session('nilai'))) --}}
                                @for ($i = 1; $i < count(session('nilai')); $i++)
                                <p>{{ session('namapenyakit')[$i] . '/' . round(session('nilai')[$i] * 100, 2) . '% dengan nilai ' . round(session('nilai')[$i], 4) }}</p>
                                @endfor
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection