@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="auth-card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fas fa-key fa-3x text-primary mb-3"></i>
                    <h4 class="fw-bold">Lupa Password?</h4>
                    <p class="text-muted">Masukkan email Anda untuk mereset password</p>
                </div>

                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                            <input type="email" name="email" id="email" 
                                   class="form-control border-0 bg-light @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" required autofocus>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Link Reset Password
                    </button>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <i class="fas fa-arrow-left me-1"></i>Kembali ke Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 