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

                    <h3>Start your 14-days free trial</h3>
                    <h6>No credit card required</h6>
                    <br>

                    <form class="login-form" method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">

                            @error('name')
                                <label style="color: #f40142">{{$message}}</label>
                            @enderror
                        </div>

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

                        <div class="form-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">

                            @error('password_confirmation')
                                <label style="color: #f40142">{{$message}}</label>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
{{--                        <p class="message">Already registered? <a href="{{url('login')}}">LogIn</a></p>--}}
                        <p class="message">Already registered? <a href="{{route('login.index', $token)}}">LogIn</a></p>

                    </form>
                    <br>
                </div>

        </div>
    </div>
</div>

@endsection
