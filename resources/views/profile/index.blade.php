@extends('adminlte::page')

@section('title', 'Profil Saya')

@section('content_header')
    <h1>Profil Saya</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body text-center">

        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
             class="img-circle elevation-2 mb-3"
             width="120">

        <h4>{{ Auth::user()->name }}</h4>

        <p>{{ Auth::user()->email }}</p>

    </div>

</div>

@stop