@extends('adminlte::page')

@section('title', 'Edit Dosen')

@section('content_header')
    <h1>Edit Dosen</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/dosen/{{ $dosen->nip }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>NIP</label>
                <input type="text"
                       name="nip"
                       class="form-control"
                       value="{{ $dosen->nip }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ $dosen->nama }}"
                       required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          required>{{ $dosen->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text"
                       name="nohp"
                       class="form-control"
                       value="{{ $dosen->nohp }}"
                       required>
            </div>

            <button class="btn btn-success mt-3">
                Update
            </button>

        </form>

    </div>
</div>

@stop