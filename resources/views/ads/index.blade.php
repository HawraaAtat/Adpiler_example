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
                            <!-- Action -->

                        </div>
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="{{url('/social-ads/create')}}" class="btn d-inline-flex btn-sm btn-primary mx-1">
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
                        <h5 class="mb-0">Your Social Ads</h5>
                    </div>

                    <br>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image Path</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ads as $ad)
                                        <tr>
                                            <td>{{ $ad->id }}</td>
                                            {{-- <td><img class="flex-shrink-0 img-fluid rounded" src="{{url('/assests/img/'. $ad->image)}}" style="width: 40px;"></td> --}}
                                            <td><img src="{{ asset('img/ads/' . $ad->image_path) }}" style="width: 25px; height: 25px;"></td>
                                            <td>{{ $ad->title }}</td>
                                            <td>{{ $ad->description }}</td>
                                            <td>{{ $ad->image_path }}</td>
                                            <td>{{ $ad->created_at }}</td>
                                            <td>{{ $ad->updated_at }}</td>
                                            <td>
                                                {{-- <a href="{{ route('social-ads.edit', $ad->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('social-ads.destroy', $ad->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
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

