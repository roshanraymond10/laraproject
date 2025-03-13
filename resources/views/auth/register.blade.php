@extends('layouts.app')
@section('title', 'User')
@section('body')
    @vite(['resources/css/register.css'])
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-0 m-4 p-5">
                    
                    <div class="h6 text-center text-muted red mt-3">Register</div>
                
                    <div class="text-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-1">
                                <input type="email" name="email" class="form-control rounded-0 bg-light" id="email"
                                    placeholder="Mobile Number or Email">
                            </div>
                            @error('email')
                                <p class="text-danger mb-1 text-start">{{ $message }}</p>
                            @enderror
                            <div class="mb-1">
                                <input type="text" name="name" class="form-control rounded-0 bg-light" id="name"
                                    placeholder="Full Name">
                            </div>
                            @error('name')
                                <p class="text-danger mb-1 text-start">{{ $message }}</p>
                            @enderror
                            <div class="mb-1">
                                <input type="text" name="username" class="form-control rounded-0 bg-light" id="name"
                                    placeholder="User Name">
                            </div>
                            @error('name')
                                <p class="text-danger mb-1 text-start">{{ $message }}</p>
                            @enderror
                            <div class="mb-1">
                                <input type="password" name="password" class="form-control rounded-0 bg-light"
                                    id="password" placeholder="Password">
                            </div>
                            @error('password')
                                <p class="text-danger mb-1 text-start">{{ $message }}</p>
                            @enderror
                            <div class="mb-1">
                                <input type="password" name="password_confirmation" class="form-control rounded-0 bg-light"
                                    id="password" placeholder="Confirm Password">
                            </div>
                            @error('password')
                                <p class="text-danger mb-1 text-start">{{ $message }}</p>
                            @enderror
                            
                            <button type="submit" class="btn btn-primary w-100">Sign up</button>
                        </form>
                    </div>
                    <div class="card-footer text-center mt-4">
                        <p>Have an account? <a href="{{ route('login') }}">Log in</a></p>
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>

@endsection
