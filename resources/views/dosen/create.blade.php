@extends('adminlte::page')

@section('title', 'Tambah Dosen')

@section('content_header')
    <h1>Tambah Dosen</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/dosen" method="POST">

            @csrf

            <div class="form-group">
                <label>NIP</label>
                <input type="text"
                       name="nip"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          required></textarea>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text"
                       name="nohp"
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