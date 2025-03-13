@extends('layouts.app')
@section('title', 'User')
@section('body')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-0 m-4">
                    <div class="p-5">
                        <div class="text-center">
                            <a href="">
                                <img class="img-fluid w-50"
                                    src="https://cdn.iconscout.com/icon/free/png-512/free-email-2026367-1713640.png?f=webp&w=256"
                                    alt="">
                            </a>
                        </div>
                        <div class="h6 text-center red mt-3">Email Confirmation Code</div>
                        <div class="text-center mt-3 ">
                            <p>Enter the confirmation code sent to your email.
                            </p>
                            <div class="text-center">
                                <form action="{{ route('verify.code') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="email" hidden name="email" value="{{ old('email', $email) }}"
                                            class="form-control rounded-0 bg-light" id="email"
                                            placeholder="Mobile Number or Email">
                                    </div>
                                    @error('email')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <input type="text" name="code" class="form-control rounded-0 bg-light"
                                            id="code" placeholder="CodeXXXXXXXXXX">
                                    </div>
                                    @error('code')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                    <button type="submit" class="btn btn-primary w-100">Send Login Link</button>
                                </form>
                            </div>
                            <div class=" text-center mt-4">
                                <a href="{{ route('register') }}">Go Back</a>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
                <div class="card">
                    <div class="card-footer text-center mt-4">
                        <p>Have an account? <a href="{{ route('login') }}">Log in</a></p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p>Get the app.</p>
                </div>
                <div class="text-center">
                    <img class="me-3" src={{ asset('images/googleplay.png') }} alt="googleplay" width="120px"
                        height="40px">
                    <img src={{ asset('images/microsoftstore.png') }} alt="microsoftstore" width="120px" height="40px">
                </div>
            </div>
        </div>
    @endsection
