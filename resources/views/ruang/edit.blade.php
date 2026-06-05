@extends('adminlte::page')

@section('title', 'Edit Ruangan')

@section('content_header')
    <h1>Edit Ruangan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/ruang/{{ $ruang->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Ruangan</label>

                <input type="text"
                       name="nama_ruang"
                       class="form-control"
                       value="{{ $ruang->nama_ruang }}"
                       required>
            </div>

            <button class="btn btn-success mt-3">
                Update
            </button>

        </form>

    </div>
</div>

@stop