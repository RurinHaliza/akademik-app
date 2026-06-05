@extends('adminlte::page')

@section('title', 'Edit Jadwal')

@section('content_header')
    <h1>Edit Jadwal Akademik</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/jadwal/{{ $jadwal->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Hari</label>

                <select name="hari"
                        class="form-control">

                    <option {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>
                        Senin
                    </option>

                    <option {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>
                        Selasa
                    </option>

                    <option {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>
                        Rabu
                    </option>

                    <option {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>
                        Kamis
                    </option>

                    <option {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>
                        Jumat
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label>Mata Kuliah</label>

                <select name="kode_mk"
                        class="form-control">

                    @foreach($matakuliah as $mk)

                        <option value="{{ $mk->kode_mk }}"
                            {{ $jadwal->kode_mk == $mk->kode_mk ? 'selected' : '' }}>

                            {{ $mk->nama_mk }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Ruangan</label>

                <select name="id_ruang"
                        class="form-control">

                    @foreach($ruang as $r)

                        <option value="{{ $r->id }}"
                            {{ $jadwal->id_ruang == $r->id ? 'selected' : '' }}>

                            {{ $r->nama_ruang }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Golongan</label>

                <select name="id_gol"
                        class="form-control">

                    @foreach($golongan as $gol)

                        <option value="{{ $gol->id }}"
                            {{ $jadwal->id_gol == $gol->id ? 'selected' : '' }}>

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