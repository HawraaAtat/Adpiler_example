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

                    <h3>Your company details</h3>
                    <h6>Before we start, please set your company details first.</h6>
                    <br>
                    <form action="{{ route('store.company') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                        </div>
                        @error('company_name')
                            <label style="color: #f40142">{{$message}}</label>
                        @enderror
                        <button type="submit" class="btn btn-primary">Ready to start</button>
                        <br>
                    </form>

                </div>
            </div>
        </div>
 </div>
</div>
@endsection


