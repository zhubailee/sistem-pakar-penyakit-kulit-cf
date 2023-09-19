@extends('template.app')

@section('title', 'Riwayat diagnosa sistem pakar penyakit kulit')

@section('pagetitle','Riwayat diagnosa')

@section('content')
<style>
    /* Dalam file CSS Anda */
.custom-progress-bar {
    animation: custom-fill-animation 2s ease-in-out;
}

@keyframes custom-fill-animation {
    from {
        width: 0;
    }
    to {
        /* width: 60%; */
    }
}

</style>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>Nama</th> --}}
                                        <th>Penyakit</th>
                                        <th>Persentase</th>
                                        <th>Solusi</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1
                                    @endphp
                                    @foreach ($diagnosa as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->namapenyakit }}</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar custom-progress-bar" role="progressbar" style="width: {{ $item->nilai*100 }}%;" aria-valuenow="{{ $item->nilai*100 }}" aria-valuemin="0" aria-valuemax="100">{{ $item->nilai*100 }}%</div>
                                                </div>
                                            </td>
                                            <td>{{ $item->solusi }}</td>
                                            <td>{{ $item->waktu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $diagnosa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection