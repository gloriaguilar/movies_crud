@extends('layouts.app')

@section('title', ' Platform')

@section('section-name', 'List Platforms')
@section('content')
    <div class="row m-5 ">
        <div class="col-5"></div>
        <div class="col-5"></div>
        <div class="col-2"><a href="{{ url('platform-add') }}" class="btn btn-success">Add platform</a></div>
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
        @foreach ($data as $value)
            <div class="col-4 mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $value->image_url }}" class="card-img-top" alt={{ $value->title }}>
                    <div class="card-body">
                        <h5 class="card-title">{{ $value->title }}</h5>
                        <p class="card-text">{{ $value->url }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('platform-edit/' . $value->id) }}" class="btn btn-info btn-sm">Edit platform</a>
                        <a href="{{ url('platform-delete/' . $value->id) }}" class="btn btn-danger btn-sm">Remove
                            platform</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
