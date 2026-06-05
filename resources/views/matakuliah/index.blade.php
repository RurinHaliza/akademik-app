@extends('adminlte::page')

@section('title', 'Data Mata Kuliah')

@section('content_header')
    <h1>Data Mata Kuliah</h1>
@stop

@section('plugins.Datatables', true)

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/matakuliah/create" class="btn btn-primary mb-3">
    Tambah Mata Kuliah
</a>

<div class="card">
    <div class="card-body">

        <table id="tableMatakuliah" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($matakuliah as $mk)

                <tr>

                    <td>{{ $mk->kode_mk }}</td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->semester }}</td>

                    <td>

                        <a href="/matakuliah/{{ $mk->kode_mk }}/edit"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/matakuliah/{{ $mk->kode_mk }}"
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
    $('#tableMatakuliah').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop