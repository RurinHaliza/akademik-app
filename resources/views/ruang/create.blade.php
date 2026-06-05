@extends('adminlte::page')

@section('title', 'Tambah Ruangan')

@section('content_header')
    <h1>Tambah Ruangan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/ruang" method="POST">

            @csrf

            <div class="form-group">
                <label>Nama Ruangan</label>

                <input type="text"
                       name="nama_ruang"
                       class="form-control"
                       required>
            </div>

            <button class="btn btn-primary mt-3">
                Simpan
            </button>

        </form>

    </div>
</div>

@stop