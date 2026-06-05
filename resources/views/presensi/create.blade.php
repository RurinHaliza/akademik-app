@extends('adminlte::page')

@section('title', 'Tambah Presensi')

@section('content_header')
    <h1>Tambah Presensi Akademik</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/presensi" method="POST">

            @csrf

            <div class="form-group">
                <label>Hari</label>

                <select name="hari"
                        class="form-control"
                        required>

                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>

                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Mahasiswa</label>

                <select name="nim"
                        class="form-control"
                        required>

                    @foreach($mahasiswa as $mhs)

                        <option value="{{ $mhs->nim }}">
                            {{ $mhs->nama }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Mata Kuliah</label>

                <select name="kode_mk"
                        class="form-control"
                        required>

                    @foreach($matakuliah as $mk)

                        <option value="{{ $mk->kode_mk }}">
                            {{ $mk->nama_mk }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Status Kehadiran</label>

                <select name="status_kehadiran"
                        class="form-control"
                        required>

                    <option>Hadir</option>
                    <option>Izin</option>
                    <option>Alpa</option>

                </select>
            </div>

            <button class="btn btn-primary mt-3">
                Simpan
            </button>

        </form>

    </div>
</div>

@stop