@extends('layout.navbar')

@section('style_in')
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
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
                            <h1 class="h2 mb-0 ls-tight">Comments</h1>
                        </div>
                        <!-- Actions -->


                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <div class="custom-search">
                                    <form action="{{ route('comments.search') }}" method="GET">
                                        @csrf
                                        <input type="text" id="site-search" class="custom-search__input" name="searchTerm" value="{{ old('searchTerm', request('searchTerm')) }}" placeholder="Search...">
                                        <button type="submit">
                                        Search
                                        <span class="custom-search__mag">
                                            <span class="pupil"></span>
                                        </span>

                                        <span class="custom-search__bridge">
                                        </span>

                                        <span class="custom-search__lens">
                                            <span class="pupil"></span>
                                        </span>

                                        </button>
                                    </form>
                                </div>
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
                        <h5 class="mb-0">Comments</h5>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Comment</th>
                                    <th scope="col">User</th>
                                    <th scope="col">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->comment_text }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->file->file_name }}</td>
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
