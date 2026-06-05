@extends('adminlte::page')

@section('title', 'Tambah KRS')

@section('content_header')
    <h1>Tambah KRS</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/krs" method="POST">

            @csrf

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

            <button class="btn btn-primary mt-3">
                Simpan
            </button>

        </form>

    </div>
</div>

@stop