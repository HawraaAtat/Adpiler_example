@extends('layout.app')

@section('body')
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Client: {{$client->client_name}}</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">File Name</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td><img src="{{ asset('img/uploads/' . $file->file_name) }}" style="width: 25px; height: 25px;"></td>
                                        <td>{{ $file->file_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
