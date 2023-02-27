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
                            <h1 class="h2 mb-0 ls-tight">Team Invitation</h1>
                        </div>
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
                        <h5 class="mb-0">Team Invitation</h5>
                    </div>

                    <br>
                    <div class="container">
                        <h2>Hello,</h2>
                        <p>You have been invited to join our team. Click the link below to accept the invitation:</p>

                        <form method="post" action="{{ route('team.invitation.accept', $invitation->token) }}">
                            @csrf
                            <button class="btn btn-primary" type="submit">Accept invitation</button>
                        </form>
                    </div>


                    <br>
                    <div class="card-footer border-0 py-5">
                        <br>
                    </div>
                </div>
            </div>
        </main>
    </div>


@endsection

