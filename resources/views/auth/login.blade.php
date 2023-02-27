@extends('layout.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/auth_style.css') }}">
@endsection

@section('body')

<div class="container">
 <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="login-page">
                <div class="form" >

                    <h3>Log in</h3>
                    <h6>Please enter your email and password below</h6>
                    <br>

                    @error('authfaild')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                        <form class="login-form" method="post" action="{{ route('login.store') }}">
                            @csrf
                            <div class="container">

                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    @error('email')
                                        <label style="color: #f40142">{{$message}}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <label style="color: #f40142">{{$message}}</label>
                                    @enderror
                                </div>

                                @if($token)
                                <input type="hidden" name="tokenn" value="{{ $token }}">
                                @endif

                                <button type="submit" class="btn btn-primary">Login</button>
                                <p class="message">Not registered? <a href="{{url('register')}}">Create an account</a></p>

                            </div>

            </form>
            <br>
        </div>
    </div>
</div>
@endsection

