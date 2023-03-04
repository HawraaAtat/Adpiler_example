@extends('layout.navbar')

@section('main')
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Clients</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                                <a href="{{url('create_client')}}" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2"><i class="bi bi-plus"></i>Create</span>
                                </a>
                            </div>
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
                        <h5 class="mb-0">Clients Details</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Client</th>
                                    <th scope="col">Campaigns</th>
                                    <th scope="col">Files</th>
                                    <th scope="col">Members</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->client_name }}</td>
                                    <td>{{ $client->campaigns->count()}}</td>
                                    <td>{{ \App\Models\File::where('client_id', $client->id)->count()}}</td>
                                    <td>
                                        @foreach ($client->users as $user)
                                            <li>{{ $user->name }}</li>
                                        @endforeach
                                    <td>
                                        <a href="{{ route('client.files', $client->token) }}" class="btn btn-primary">View Files</a>
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-primary">View</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
