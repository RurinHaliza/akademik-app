@extends('adminlte::page')

@section('title', 'Edit Golongan')

@section('content_header')
    <h1>Edit Golongan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/golongan/{{ $golongan->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Golongan</label>

                <input type="text"
                       name="nama_gol"
                       class="form-control"
                       value="{{ $golongan->nama_gol }}"
                       required>
            </div>

            <button class="btn btn-success mt-3">
                Update
            </button>

        </form>

    </div>
</div>

@stop