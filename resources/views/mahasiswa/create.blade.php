@extends('adminlte::page')

@section('title', 'Tambah Mahasiswa')

@section('content_header')
    <h1>Tambah Mahasiswa</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/mahasiswa" method="POST">

            @csrf

            <div class="form-group">
                <label>NIM</label>
                <input type="text"
                       name="nim"
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
                <label>Email</label>
                <input type="email"
                    name="email"
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

            <div class="form-group">
                <label>Semester</label>
                <input type="number"
                       name="semester"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Golongan</label>

                <select name="id_gol"
                        class="form-control"
                        required>

                    <option value="">-- Pilih Golongan --</option>

                    @foreach($golongan as $gol)

                        <option value="{{ $gol->id }}">
                            {{ $gol->nama_gol }}
                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-primary mt-3">
                Simpan
            </button>

        </form>

    </div>
</div>

@stop