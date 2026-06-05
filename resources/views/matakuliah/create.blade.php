@extends('adminlte::page')

@section('title', 'Tambah Mata Kuliah')

@section('content_header')
    <h1>Tambah Mata Kuliah</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/matakuliah" method="POST">

            @csrf

            <div class="form-group">
                <label>Kode MK</label>
                <input type="text"
                       name="kode_mk"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Nama Mata Kuliah</label>
                <input type="text"
                       name="nama_mk"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>SKS</label>
                <input type="number"
                       name="sks"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <input type="number"
                       name="semester"
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