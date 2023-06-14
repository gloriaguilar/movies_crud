@extends('layouts.app')

@section('title', 'Category')
@section('section-name', 'Edit Category')
@section('content')
    <form class="row  w-50 m-auto  g-3 needs-validation" novalidate method="POST" action="{{ url('category-update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $categoryToEdit->id }}">
        <div class="col-lg-12 ">
            <label for="validationTitle" class="form-label">Title </label>
            <input type="text" name="title" class="form-control" id="validationTitle"
                value="{{ $categoryToEdit->title }}" required>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-lg-12">
            <label for="validationDescription" class="form-label">Description</label>
            <br>
            <textarea required name="description" class="form-control" id="validationDescription">{{ $categoryToEdit->description }}</textarea>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Edit Platform</button>
            <a href="{{ url('category-list') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
    @if (Session::has('success'))
        <div class="alert alert-success my-3" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection
