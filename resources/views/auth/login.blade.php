@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #4f46e5, #2563eb);
        min-height: 100vh;
    }

    .login-wrapper {
        min-height: 85vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-card {
        width: 100%;
        max-width: 450px;
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        overflow: hidden;
    }

    .login-header {
        text-align: center;
        padding: 30px 20px 15px;
    }

    .login-header h2 {
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .login-header p {
        color: #6b7280;
        margin-bottom: 0;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px;
    }

    .btn-login {
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
    }

    .logo-circle {
        width: 80px;
        height: 80px;
        background: #2563eb;
        color: white;
        border-radius: 50%;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 15px;
    }
</style>

<div class="container">
    <div class="login-wrapper">

        <div class="card login-card">

            <div class="login-header">

                <div class="logo-circle">
                    SIA
                </div>

                <h2>Sistem Informasi Akademik</h2>
                <p>Silakan login untuk melanjutkan</p>

            </div>

            <div class="card-body px-4 pb-4">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input id="email"
                               type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus>

                        @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input id="password"
                               type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               required>

                        @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-check mb-3">

                        <input class="form-check-input"
                               type="checkbox"
                               name="remember"
                               id="remember">

                        <label class="form-check-label" for="remember">
                            Ingat Saya
                        </label>

                    </div>

                    <button type="submit"
                            class="btn btn-primary btn-login w-100">

                        Login

                    </button>

                    <div class="text-center mt-3">

                        <a href="{{ route('register') }}">
                            Belum punya akun? Daftar
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
@endsection