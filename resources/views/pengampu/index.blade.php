@extends('adminlte::page')

@section('title', 'Pengampu')

@section('content_header')
<h1>Data Pengampu</h1>
@stop

@section('content')

@if(auth()->user()->role == 'admin')

<a href="{{ route('pengampu.create') }}"
   class="btn btn-primary mb-3">

    Tambah Pengampu

</a>

@endif

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Dosen</th>
            <th>Mata Kuliah</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @foreach($pengampus as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->dosen->nama }}</td>

            <td>{{ $item->matakuliah->nama_mk }}</td>

            <td>
                <a href="{{ route('pengampu.edit',$item->id) }}"
                class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('pengampu.destroy',$item->id) }}"
                    method="POST"
                    style="display:inline-block">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm">

                        Hapus

                    </button>

                </form>
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@stop