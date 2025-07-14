@extends('layouts.auth')

@section('title', 'Login Admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="auth-card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fas fa-user-circle fa-3x text-primary mb-3"></i>
                    <h4 class="fw-bold">Login Admin</h4>
                    <p class="text-muted">Silakan login untuk mengakses panel admin</p>
                </div>

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
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

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0">
                                <i class="fas fa-lock text-muted"></i>
                            </span>
                            <input type="password" name="password" id="password" 
                                   class="form-control border-0 bg-light @error('password') is-invalid @enderror" 
                                   required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>

                    <div class="text-center">
                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                            <i class="fas fa-key me-1"></i>Lupa Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 