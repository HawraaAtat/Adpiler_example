@extends('layout.navbar')

@section('style_in')
<link rel="stylesheet" href="{{ asset('css/upload_file.css') }}">
@endsection

@section('main')
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">team member</h1>
                        </div>
                        <!-- Actions -->


                    </div>
                    <br>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Add team member</h5>
                    </div>
                    <br>


                    <div class="container">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('team-members.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                              @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                              @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                              @error('password')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="role_id">Role</label>
                              <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                <option value="">Select role</option>

                                  <option value="Admin">Admin</option>
                                  <option value="Manager">Manager </option>
                                  <option value="User">User</option>

                              </select>
                              @error('role_id')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>


                            <div class="form-group">
                              <label for="team_id">Team</label>
                              <select name="team_id" id="team_id" class="form-control @error('team_id') is-invalid @enderror">
                                <option value="">Select Team</option>
                                @foreach($teams as $team)
                                  <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                @endforeach
                              </select>
                              @error('team_id')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Or Create A New Team</label>
                                <input type="text" name="team_name" id="team_name" class="form-control @error('team_name') is-invalid @enderror" value="{{ old('team_name') }}">
                                @error('team_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                          </form>

                    </div>


                    <div class="card-footer border-0 py-5">
                    </div>
                </div>
            </div>
        </main>
    </div>


@endsection

