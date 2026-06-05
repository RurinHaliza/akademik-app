@extends('adminlte::page')

@section('title', 'Data Mahasiswa')

@section('content_header')
    <h1>Data Mahasiswa</h1>
@stop

@section('content')

@section('plugins.Datatables', true)

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/mahasiswa/create" class="btn btn-primary mb-3">
    Tambah Mahasiswa
</a>

<div class="card">
    <div class="card-body">

        <table id="tableMahasiswa" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Semester</th>
                    <th>Golongan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($mahasiswa as $mhs)

                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->alamat }}</td>
                    <td>{{ $mhs->nohp }}</td>
                    <td>{{ $mhs->semester }}</td>
                    <td>{{ $mhs->golongan->nama_gol }}</td>

                    <td>

                        <a href="/mahasiswa/{{ $mhs->nim }}/edit"
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <form action="/mahasiswa/{{ $mhs->nim }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')">
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

@section('plugins.Datatables', true)

@section('js')

<script>
$(function () {
    $('#tableMahasiswa').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop