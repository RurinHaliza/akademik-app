@extends('adminlte::page')

@section('title', 'Jadwal Kuliah')

@section('content_header')
<h1>Jadwal Kuliah Saya</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Mata Kuliah</th>
                    <th>Ruang</th>
                    <th>Golongan</th>
                </tr>
            </thead>

            <tbody>

            @foreach($jadwal as $item)

                <tr>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->matakuliah->nama_mk }}</td>
                    <td>{{ $item->ruang->nama_ruang }}</td>
                    <td>{{ $item->golongan->nama_gol }}</td>
                </tr>

            @endforeach

            </tbody>

        </table>

    </div>
</div>

@stop