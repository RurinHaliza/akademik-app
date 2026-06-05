@extends('adminlte::page')

@section('title', 'Presensi Saya')

@section('content_header')
<h1>Presensi Saya</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Mata Kuliah</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach($presensi as $p)

                <tr>

                    <td>{{ $p->tanggal }}</td>

                    <td>{{ $p->hari }}</td>

                    <td>{{ $p->matakuliah->nama_mk }}</td>

                    <td>

                        @if($p->status_kehadiran == 'Hadir')
                            <span class="badge bg-success">
                                Hadir
                            </span>

                        @elseif($p->status_kehadiran == 'Izin')
                            <span class="badge bg-warning">
                                Izin
                            </span>

                        @else
                            <span class="badge bg-danger">
                                Alpa
                            </span>
                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>
</div>

@stop