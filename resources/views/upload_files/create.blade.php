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
                            <h1 class="h2 mb-0 ls-tight">Upload File</h1>
                        </div>
                        <!-- Actions -->


                        {{-- <div class="col-sm-6 col-12 text-sm-end">
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
                        </div> --}}



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
                        <h5 class="mb-0">Upload File</h5>
                    </div>

{{--                    <div class="container">--}}
{{--                        <ul class="progress-tracker">--}}
{{--                            <li class="complete">--}}
{{--                                <div class="step">1</div>--}}
{{--                                <div class="label">Select client</div>--}}
{{--                            </li>--}}
{{--                            <li class="complete">--}}
{{--                                <div class="step">2</div>--}}
{{--                                <div class="label">Upload files</div>--}}
{{--                            </li>--}}
{{--                            <li class="active">--}}
{{--                                <div class="step">3</div>--}}
{{--                                <div class="label">Confirm files</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="step">4</div>--}}
{{--                                <div class="label">Page setup</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="step">5</div>--}}
{{--                                <div class="label">Settings</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <br>

                    <div class="container">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('upload-files.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="client_id">Select Client</label>
                                <select name="client_id" id="client_id" class="form-control">
                                    <option value="">Select client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <label style="color: #f40142">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="client_name">Or add new client</label>
                                <input type="text" name="client_name" id="client_name" class="form-control">
                                @error('client_name')
                                    <label style="color: #f40142">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="campaign_id">Select Campaign</label>
                                <select name="campaign_id" id="campaign_id" class="form-control">
                                    <option value="">Select campaign</option>
                                    @foreach ($campaigns as $campaign)
                                        {{-- <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option> --}}
                                        <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                                    @endforeach
                                </select>
                                @error('campaign_id')
                                    <label style="color: #f40142">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="campaign_name">Or add new campaign</label>
                                <input type="text" name="campaign_name" id="campaign_name" class="form-control">
                                @error('campaign_name')
                                    <label style="color: #f40142">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="file">Upload File</label>
                                <input type="file" name="file" id="file" class="form-control">
                                @error('file')
                                    <label style="color: #f40142">{{$message}}</label>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>

                    </div>


                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>


@endsection

