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
                            <h1 class="h2 mb-0 ls-tight">Social Ads</h1>
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
                        <h5 class="mb-0">Create Social Ads</h5>
                    </div>

                    <br>
                        <div class="container">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('social-ads.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="platform_id">Select Platform</label>
                                    <select name="platform_id" id="platform_id" class="form-control">
                                        <option value="">Select platform</option>
                                        @foreach ($platforms as $platform)
                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('platform_id')
                                        <label style="color: #f40142">{{$message}}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="campaign_id">Select Campaign</label>
                                    <select name="campaign_id" id="campaign_id" class="form-control">
                                        <option value="">Select Campaign</option>
                                        @foreach ($campaigns as $campaign)
                                            <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('campaign_id')
                                        <label style="color: #f40142">{{$message}}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                    @error('title')
                                        <label style="color: #f40142">{{$message}}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                    @error('description')
                                        <label style="color: #f40142">{{$message}}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @error('image')
                                        <label style="color: #f40142">{{$message}}</label>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Create Ad</button>
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

