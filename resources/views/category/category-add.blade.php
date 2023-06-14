@extends('layouts.app')

@section('title', 'Categories')
@section('section-name', 'Create Category')
@section('content')
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ url('category-save') }}">
        @csrf
        <div class="col-md-4">
            <label for="validationTitle" class="form-label">Title </label>
            <input type="text" name="title" class="form-control" id="validationTitle" required>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationDescription" class="form-label">Description </label>
            <input type="text" name="description" class="form-control" id="validationDescription" required>
            <div id="validationTitle" class="invalid-feedback">
                This field is required
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create Category</button>
            <a href="{{ url('category-list') }}" class="btn btn-danger">Back to the list</a>
        </div>
    </form>
    @if (Session::has('success'))
        <div class="alert alert-success my-3" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection
