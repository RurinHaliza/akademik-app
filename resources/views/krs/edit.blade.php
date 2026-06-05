@extends('adminlte::page')

@section('title', 'Edit KRS')

@section('content_header')
    <h1>Edit KRS</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/krs/{{ $krs->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Mahasiswa</label>

                <select name="nim"
                        class="form-control">

                    @foreach($mahasiswa as $mhs)

                        <option value="{{ $mhs->nim }}"
                            {{ $krs->nim == $mhs->nim ? 'selected' : '' }}>

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
                            {{ $krs->kode_mk == $mk->kode_mk ? 'selected' : '' }}>

                            {{ $mk->nama_mk }}

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