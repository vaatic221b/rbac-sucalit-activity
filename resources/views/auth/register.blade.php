@extends('mainLayout')

@section('page-title','Account Registration')

@section('auth-content')
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center" style="font-size: 1.6rem;">Register New User</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required class="form-control">
                            @error('firstname')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required class="form-control">
                            @error('lastname')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
                            <div class="form-check mt-1">
                                <input type="checkbox" name="generate_email" id="generate_email" class="form-check-input">
                                <label for="generate_email" class="form-check-label">Generate Email Address</label>
                            </div>
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" required class="form-control">
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="link-dark">Return to Landing Page</a>
        </div>
    </div>
</div>
@endsection
