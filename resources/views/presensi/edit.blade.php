@extends('adminlte::page')

@section('title', 'Edit Presensi')

@section('content_header')
    <h1>Edit Presensi Akademik</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/presensi/{{ $presensi->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Hari</label>

                <select name="hari"
                        class="form-control">

                    <option {{ $presensi->hari == 'Senin' ? 'selected' : '' }}>
                        Senin
                    </option>

                    <option {{ $presensi->hari == 'Selasa' ? 'selected' : '' }}>
                        Selasa
                    </option>

                    <option {{ $presensi->hari == 'Rabu' ? 'selected' : '' }}>
                        Rabu
                    </option>

                    <option {{ $presensi->hari == 'Kamis' ? 'selected' : '' }}>
                        Kamis
                    </option>

                    <option {{ $presensi->hari == 'Jumat' ? 'selected' : '' }}>
                        Jumat
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       value="{{ $presensi->tanggal }}">
            </div>

            <div class="form-group">
                <label>Mahasiswa</label>

                <select name="nim"
                        class="form-control">

                    @foreach($mahasiswa as $mhs)

                        <option value="{{ $mhs->nim }}"
                            {{ $presensi->nim == $mhs->nim ? 'selected' : '' }}>

                            {{ $mhs->nama }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Mata Kuliah</label>

                <select name="kode_mk"
                        class="form-control">

                    @foreach($matakuliah as $mk)

                        <option value="{{ $mk->kode_mk }}"
                            {{ $presensi->kode_mk == $mk->kode_mk ? 'selected' : '' }}>

                            {{ $mk->nama_mk }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Status Kehadiran</label>

                <select name="status_kehadiran"
                        class="form-control">

                    <option {{ $presensi->status_kehadiran == 'Hadir' ? 'selected' : '' }}>
                        Hadir
                    </option>

                    <option {{ $presensi->status_kehadiran == 'Izin' ? 'selected' : '' }}>
                        Izin
                    </option>

                    <option {{ $presensi->status_kehadiran == 'Alpa' ? 'selected' : '' }}>
                        Alpa
                    </option>

                </select>
            </div>

            <button class="btn btn-success mt-3">
                Update
            </button>

        </form>

    </div>
</div>

@stop