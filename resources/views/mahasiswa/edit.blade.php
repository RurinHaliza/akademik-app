@extends('adminlte::page')

@section('title', 'Edit Mahasiswa')

@section('content_header')
    <h1>Edit Mahasiswa</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/mahasiswa/{{ $mahasiswa->nim }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>NIM</label>
                <input type="text"
                       name="nim"
                       class="form-control"
                       value="{{ $mahasiswa->nim }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ $mahasiswa->nama }}"
                       required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          required>{{ $mahasiswa->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text"
                       name="nohp"
                       class="form-control"
                       value="{{ $mahasiswa->nohp }}"
                       required>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <input type="number"
                       name="semester"
                       class="form-control"
                       value="{{ $mahasiswa->semester }}"
                       required>
            </div>

            <div class="form-group">
                <label>Golongan</label>

                <select name="id_gol"
                        class="form-control"
                        required>

                    @foreach($golongan as $gol)

                        <option value="{{ $gol->id }}"
                            {{ $mahasiswa->id_gol == $gol->id ? 'selected' : '' }}>

                            {{ $gol->nama_gol }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-success mt-3">
                Update
            </button>

        </form>

    </div>
</div>

@stop