@extends('layouts.app')

@section('title', 'Movie')
@section('section-name', 'Create New Movie')
@section('content')
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ url('movie-save') }}">
        @csrf
        <div class="col-md-4">
            <label for="validationTitle" class="form-label">Title </label>
            <input type="text" name="title" class="form-control" id="validationTitle" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationDescription" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="validationDescription" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationUrImage" class="form-label">URL image</label>
            <input type="text" name="url_image" class="form-control" id="validationUrImage" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationYear" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" id="validationYear" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label">Category</label>
            <select class="form-select" name="category">
                <option selected>Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Platform to watch</label>
            <select class="form-select" name="platform">
                <option selected>Select category</option>
                @foreach ($platforms as $platform)
                    <option value="{{ $platform->id }}">{{ $platform->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create movie</button>
            <a href="{{ url('movie-list') }}" class="btn btn-danger">Back to the list</a>
        </div>
    </form>
    @if (Session::has('success'))
        <div class="alert alert-success my-3" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection
