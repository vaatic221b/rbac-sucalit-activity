@extends('mainLayout')

@section('page-title','Account Login')

@section('auth-content')
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center" style="font-size: 1.6rem;">User Login</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="form">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" required class="form-control">
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-md">Login</button>
                        <button type="reset" class="btn btn-danger btn-md">Clear</button>
                    </div>
                    <div class="text-center mt-3">
                        Not a user? Register <a href="{{ route('register') }}">here</a>.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
