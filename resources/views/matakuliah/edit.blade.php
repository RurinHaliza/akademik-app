@extends('adminlte::page')

@section('title', 'Edit Mata Kuliah')

@section('content_header')
    <h1>Edit Mata Kuliah</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/matakuliah/{{ $matakuliah->kode_mk }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Kode MK</label>
                <input type="text"
                       name="kode_mk"
                       class="form-control"
                       value="{{ $matakuliah->kode_mk }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Nama Mata Kuliah</label>
                <input type="text"
                       name="nama_mk"
                       class="form-control"
                       value="{{ $matakuliah->nama_mk }}"
                       required>
            </div>

            <div class="form-group">
                <label>SKS</label>
                <input type="number"
                       name="sks"
                       class="form-control"
                       value="{{ $matakuliah->sks }}"
                       required>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <input type="number"
                       name="semester"
                       class="form-control"
                       value="{{ $matakuliah->semester }}"
                       required>
            </div>

            <button class="btn btn-success mt-3">
                Update
            </button>

        </form>

    </div>
</div>

@stop