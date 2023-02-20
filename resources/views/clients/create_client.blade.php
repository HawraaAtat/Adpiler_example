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

                    <h3>Add New Client</h3>
                    <br>

                    <form action="{{ route('client.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name">
                            @error('client_name')
                                <label style="color: #f40142">{{$message}}</label>
                             @enderror

                        </div>

                        <div class="form-group">
                            <label for="users">Users</label>
                            <select name="users[]" id="users" class="form-control" multiple required>

                                    <ul>
                                        @foreach ($uniqueUsers as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </ul>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Add Client</button>
                    </form>

                </div>
            </div>
        </div>
 </div>
</div>
@endsection


