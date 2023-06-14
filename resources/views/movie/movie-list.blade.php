@extends('layouts.app')

@section('title', 'Movies')

@section('section-name', 'List movies')
@section('content')
    <div class="row m-5 ">
        <div class="col-5"></div>
        <div class="col-5"></div>
        <div class="col-2"><a href="{{ url('movie-add') }}" class="btn btn-success text-end">Add movie</a></div>
    </div>
    <div class="row w-75 mx-auto text-center">
        @if (Session::has('success'))
            <div class="alert alert-success text-center my-3" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger text-center my-3" role="alert">
                {{ Session::get('fail') }}
            </div>
        @endif
    </div>
    <div class="row">
        @foreach ($movies as $value)
            <div class="col-4 mb-2">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $value->url_image }}" class="img-fluid rounded-start" alt={{ $value->title }}>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $value->title }}</h5>
                                <p class="card-text">{{ $value->description }}</p>
                                <p class="card-text"><small
                                        class="text-body-secondary">{{ $value->category->title }}</small>
                                </p>
                                <p class="card-text"><small
                                        class="text-body-secondary">{{ $value->platform->title }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url('movie-edit/' . $value->id) }}" class="btn btn-info btn-sm">Edit movie</a>
                        <a href="{{ url('movie-delete/' . $value->id) }}" class="btn btn-danger btn-sm">Remove
                            movie</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
