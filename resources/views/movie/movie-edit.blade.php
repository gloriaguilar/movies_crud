@extends('layouts.app')

@section('title', 'Movie')
@section('section-name', 'Edit Movie')
@section('content')
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ url('movie-update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $movieToEdit->id }}">
        <div class="col-md-4">
            <label for="validationTitle" class="form-label">Title </label>
            <input type="text" name="title" class="form-control" id="validationTitle" value="{{ $movieToEdit->title }}"
                required>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationDescription" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="validationDescription"
                value="{{ $movieToEdit->description }}" required>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationUrImage" class="form-label">URL image</label>
            <input type="text" name="url_image" class="form-control" id="validationUrImage"
                value="{{ $movieToEdit->url_image }}" required>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationYear" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" id="validationYear" value="{{ $movieToEdit->year }}"
                required>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label">Category</label>
            <select class="form-select" name="category">
                <option selected>Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }} " {{ $category->id == $movieToEdit->category_id ? 'selected' : '' }}>
                        {{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Platform to watch</label>
            <select class="form-select" name="platform">
                <option selected>Select platform</option>
                @foreach ($platforms as $platform)
                    <option value="{{ $platform->id }}" {{ $platform->id == $movieToEdit->platform_id ? 'selected' : '' }}>
                        {{ $platform->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn-info" type="submit">Edit movie</button>
            <a href="{{ url('movie-list') }}" class="btn btn-danger">Back to the list</a>
        </div>
    </form>
    @if (Session::has('success'))
        <div class="alert alert-success my-3" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection
