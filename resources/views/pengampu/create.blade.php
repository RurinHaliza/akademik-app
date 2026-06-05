@extends('adminlte::page')

@section('title', 'Tambah Pengampu')

@section('content_header')
<h1>Tambah Pengampu</h1>
@stop

@section('content')

<form action="{{ route('pengampu.store') }}"
      method="POST">

    @csrf

    <div class="card">

        <div class="card-body">

            <div class="form-group mb-3">

                <label>Dosen</label>

                <select name="nip"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Dosen --
                    </option>

                    @foreach($dosens as $dosen)

                        <option value="{{ $dosen->nip }}">
                            {{ $dosen->nama }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mb-3">

                <label>Mata Kuliah</label>

                <select name="kode_mk"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Mata Kuliah --
                    </option>

                    @foreach($matakuliahs as $mk)

                        <option value="{{ $mk->kode_mk }}">
                            {{ $mk->nama_mk }}
                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

        </div>

    </div>

</form>

@stop