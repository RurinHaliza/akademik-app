@extends('adminlte::page')

@section('title', 'Tambah Jadwal')

@section('content_header')
    <h1>Tambah Jadwal Akademik</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/jadwal" method="POST">

            @csrf

            <div class="form-group">
                <label>Hari</label>

                <select name="hari"
                        class="form-control"
                        required>

                    <option value="">-- Pilih Hari --</option>

                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>

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
                <label>Ruangan</label>

                <select name="id_ruang"
                        class="form-control"
                        required>

                    @foreach($ruang as $r)

                        <option value="{{ $r->id }}">
                            {{ $r->nama_ruang }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Golongan</label>

                <select name="id_gol"
                        class="form-control"
                        required>

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