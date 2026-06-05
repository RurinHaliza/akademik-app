@extends('layouts.app')

@section('content')

<style>
    .navbar {
        display: none !important;
    }

    body{
        background: linear-gradient(135deg,#003366,#00509d,#0077cc);
        min-height:100vh;
    }

    .login-container{
        min-height:90vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .login-card{
        width:100%;
        max-width:1100px;
        border:none;
        border-radius:25px;
        overflow:hidden;
        box-shadow:0 20px 40px rgba(0,0,0,.2);
    }

    .left-panel{
        background:white;
        padding:60px 40px;
        text-align:center;
        height:100%;
    }

    .left-panel img{
        width:180px;
        height:auto;
        margin-bottom:25px;
    }

    .left-panel h1{
        font-weight:700;
        color:#003366;
        margin-bottom:10px;
    }

    .left-panel h5{
        color:#6c757d;
        margin-bottom:35px;
    }

    .feature-list{
        text-align:left;
        max-width:300px;
        margin:auto;
    }

    .feature-list p{
        font-size:16px;
        margin-bottom:15px;
        color:#374151;
    }

    .right-panel{
        background:#f8fafc;
        padding:60px 50px;
    }

    .login-title{
        font-weight:700;
        color:#003366;
        margin-bottom:10px;
    }

    .login-subtitle{
        color:#6b7280;
        margin-bottom:30px;
    }

    .form-control{
        border-radius:12px;
        padding:12px;
    }

    .input-group-text{
        border-radius:12px 0 0 12px;
    }

    .btn-login{
        border-radius:12px;
        padding:12px;
        font-weight:600;
        font-size:16px;
    }

    .login-note{
        font-size:14px;
        color:#6b7280;
        text-align:center;
        margin-top:20px;
    }

    .footer-text{
        text-align:center;
        margin-top:30px;
        color:#9ca3af;
        font-size:13px;
    }

    @media(max-width:768px){

        .left-panel{
            display:none;
        }

        .right-panel{
            padding:40px 25px;
        }

        .login-card{
            max-width:450px;
        }
    }
</style>

<div class="container-fluid">
    <div class="login-container">

        <div class="card login-card">

            <div class="row g-0">

                <!-- PANEL KIRI -->
                <div class="col-md-6">

                    <div class="left-panel">

                        <img src="{{ asset('images/Logo_Polije.png') }}"
                             alt="Logo POLIJE">

                        <h1>SIAKAD POLIJE</h1>

                        <h5>Politeknik Negeri Jember</h5>

                        <div class="feature-list">

                            <p>
                                <i class="fas fa-check-circle text-success"></i>
                                Kartu Rencana Studi (KRS)
                            </p>

                            <p>
                                <i class="fas fa-check-circle text-success"></i>
                                Presensi Akademik
                            </p>

                            <p>
                                <i class="fas fa-check-circle text-success"></i>
                                Jadwal Perkuliahan
                            </p>

                            <p>
                                <i class="fas fa-check-circle text-success"></i>
                                Monitoring Akademik
                            </p>

                        </div>

                    </div>

                </div>

                <!-- PANEL KANAN -->
                <div class="col-md-6">

                    <div class="right-panel">

                        <h2 class="login-title">
                            Selamat Datang
                        </h2>

                        <p class="login-subtitle">
                            Login untuk mengakses Sistem Informasi Akademik
                        </p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">

                                <label>Email</label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>

                                    <input type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Masukkan email"
                                           required
                                           autofocus>

                                </div>

                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                            <div class="mb-3">

                                <label>Password</label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>

                                    <input type="password"
                                           id="password"
                                           name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Masukkan password"
                                           required>

                                    <button type="button"
                                            class="btn btn-outline-secondary"
                                            onclick="togglePassword()">

                                        <i class="fas fa-eye"></i>

                                    </button>

                                </div>

                                @error('password')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                            <div class="form-check mb-4">

                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember">

                                <label class="form-check-label"
                                       for="remember">

                                    Ingat Saya

                                </label>

                            </div>

                            <button type="submit"
                                    class="btn btn-primary btn-login w-100">

                                Login

                            </button>

                            <div class="login-note">

                                <i class="fas fa-info-circle"></i>

                                Akun mahasiswa dan dosen dikelola oleh administrator akademik.

                            </div>

                            <div class="footer-text">

                                © {{ date('Y') }}
                                Politeknik Negeri Jember

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<script>
function togglePassword()
{
    const password = document.getElementById('password');

    if(password.type === 'password')
    {
        password.type = 'text';
    }
    else
    {
        password.type = 'password';
    }
}
</script>

@endsection