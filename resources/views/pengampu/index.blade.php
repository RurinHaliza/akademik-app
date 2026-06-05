@extends('adminlte::page')

@section('title', 'Pengampu')

@section('content_header')
<h1>Data Pengampu</h1>
@stop

@section('content')

<a href="{{ route('pengampu.create') }}"
   class="btn btn-primary mb-3">

    Tambah Pengampu

</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Dosen</th>
            <th>Mata Kuliah</th>
        </tr>
    </thead>

    <tbody>

        @foreach($pengampus as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->dosen->nama_dosen }}</td>

            <td>{{ $item->matakuliah->nama_mk }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@stop