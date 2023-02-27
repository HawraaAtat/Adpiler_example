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


                            <form method="POST" action="{{ route('team-members.store') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Name">
                                    @error('name')
                                    <div style="color: #f40142">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                    <div style="color: #f40142"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select id="role" class="form-control" name="role">
                                        <option value="">Select Role</option>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                    </select>
                                    @error('role')
                                    <div style="color: #f40142">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select id="team_id" class="form-control" name="team_id">
                                        <option value="">Select Team</option>
                                        @foreach($userTeams as $team)
                                            <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>
                                                {{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('team_id')
                                    <div style="color: #f40142">{{ $message }}</div>
                                    @enderror
                                </div>



                                <button class="btn btn-primary" type="submit">Send Invitation</button>
                            </form>

                            <br>
                    </div>


                    <div class="card-footer border-0 py-5">
                    </div>
                </div>
            </div>
        </main>
    </div>


@endsection

