@extends('adminlte::page')

@section('title', 'Tambah Golongan')

@section('content_header')
    <h1>Tambah Golongan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/golongan" method="POST">

            @csrf

            <div class="form-group">
                <label>Nama Golongan</label>

                <input type="text"
                       name="nama_gol"
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