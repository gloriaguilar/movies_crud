@extends('layouts.app')

@section('title', 'Platform')
@section('section-name', 'Edit Platform')
@section('content')
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ url('platform-update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="col-md-4">
            <label for="validationTitle" class="form-label">Title </label>
            <input type="text" name="title" class="form-control" id="validationTitle" value="{{ $data->title }}"
                required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationUrlSite" class="form-label">URL site</label>
            <input type="text" name="url" class="form-control" id="validationUrlSite" value="{{ $data->url }}"
                required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationUrImage" class="form-label">URL Logo</label>
            <input type="text" name="image_url" class="form-control" id="validationUrImage"
                value="{{ $data->image_url }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Edit Platform</button>
            <a href="{{ url('platform-list') }}" class="btn btn-danger">Cancel</a>
        </div>

    </form>
    @if (Session::has('success'))
        <div class="alert alert-success my-3" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection
