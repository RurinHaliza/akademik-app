@extends('adminlte::page')

@section('title', 'Presensi Akademik')

@section('content_header')
    <h1>Presensi Akademik</h1>
@stop

@section('plugins.Datatables', true)

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/presensi/create" class="btn btn-primary mb-3">
    Tambah Presensi
</a>

<div class="card">
    <div class="card-body">

        <table id="tablePresensi" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($presensi as $p)

                <tr>

                    <td>{{ $p->hari }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->mahasiswa->nama }}</td>
                    <td>{{ $p->matakuliah->nama_mk }}</td>

                    <td>

                        @if($p->status_kehadiran == 'Hadir')

                            <span class="badge badge-success">
                                Hadir
                            </span>

                        @elseif($p->status_kehadiran == 'Izin')

                            <span class="badge badge-warning">
                                Izin
                            </span>

                        @else

                            <span class="badge badge-danger">
                                Alpa
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="/presensi/{{ $p->id }}/edit"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/presensi/{{ $p->id }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>
</div>

@stop

@section('js')
<script>
$(function () {
    $('#tablePresensi').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop