@extends('adminlte::page')

@section('title', 'Jadwal Akademik')

@section('content_header')
    <h1>Jadwal Akademik</h1>
@stop

@section('plugins.Datatables', true)

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(auth()->user()->role == 'admin')
<a href="/jadwal/create" class="btn btn-primary mb-3">
    Tambah Jadwal
</a>
@endif

<div class="card">
    <div class="card-body">

        <table id="tableJadwal" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Mata Kuliah</th>
                    <th>Ruangan</th>
                    <th>Golongan</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>

            <tbody>

                @foreach($jadwal as $j)

                <tr>

                    <td>{{ $j->hari }}</td>
                    <td>{{ $j->matakuliah->nama_mk }}</td>
                    <td>{{ $j->ruang->nama_ruang }}</td>
                    <td>{{ $j->golongan->nama_gol }}</td>

                    @if(auth()->user()->role == 'admin')
                    <td>

                        <a href="/jadwal/{{ $j->id }}/edit"
                        class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/jadwal/{{ $j->id }}"
                            method="POST"
                            style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>
                    @endif

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
    $('#tableJadwal').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop