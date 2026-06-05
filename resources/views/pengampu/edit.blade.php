@extends('adminlte::page')

@section('title', 'Edit Pengampu')

@section('content_header')
<h1>Edit Pengampu</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('pengampu.update',$pengampu->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Dosen</label>

                <select name="nip"
                        class="form-control"
                        required>

                    @foreach($dosens as $dosen)

                    <option value="{{ $dosen->nip }}"
                        {{ $pengampu->nip == $dosen->nip ? 'selected' : '' }}>

                        {{ $dosen->nama }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Mata Kuliah</label>

                <select name="kode_mk"
                        class="form-control"
                        required>

                    @foreach($matakuliahs as $mk)

                    <option value="{{ $mk->kode_mk }}"
                        {{ $pengampu->kode_mk == $mk->kode_mk ? 'selected' : '' }}>

                        {{ $mk->nama_mk }}

                    </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-success">
                Update
            </button>

            <a href="{{ route('pengampu.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@stop