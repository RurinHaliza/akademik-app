@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center"
    style="background: linear-gradient(135deg, #4f46e5, #2563eb);">

    <div class="card shadow-lg border-0 rounded-4 p-4"
        style="width: 450px;">

        <div class="text-center mb-4">
            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                style="width:80px;height:80px;">
                <span class="text-white fw-bold fs-2">SIA</span>
            </div>

            <h2 class="mt-3 fw-bold">
                Registrasi Mahasiswa
            </h2>

            <p class="text-muted">
                Buat akun untuk mengakses Sistem Informasi Akademik
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>

                <input id="name"
                    type="text"
                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}"
                    required>

                @error('name')
                <span class="invalid-feedback d-block">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>

                <input id="email"
                    type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    required>

                @error('email')
                <span class="invalid-feedback d-block">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>

                <input id="password"
                    type="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    name="password"
                    required>

                @error('password')
                <span class="invalid-feedback d-block">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Konfirmasi Password
                </label>

                <input id="password-confirm"
                    type="password"
                    class="form-control form-control-lg"
                    name="password_confirmation"
                    required>
            </div>

            <button type="submit"
                class="btn btn-primary btn-lg w-100">
                Daftar
            </button>

            <div class="text-center mt-3">
                Sudah punya akun?
                <a href="{{ route('login') }}">
                    Login
                </a>
            </div>
        </form>

    </div>
</div>
@endsection