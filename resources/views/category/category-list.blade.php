@extends('layouts.app')

@section('title', 'Category')

@section('section-name', 'Category')
@section('content')
    <div class="row m-5 ">
        <div class="col-5"></div>
        <div class="col-5"></div>
        <div class="col-2"><a href="{{ url('category-add') }}" class="btn btn-success">Add Category</a></div>
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
        @foreach ($categories as $value)
            <div class="col-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $value->title }}</h5>
                        <p class="card-text">{{ $value->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('category-edit/' . $value->id) }}" class="btn btn-info btn-sm">Edit Category</a>
                        <a href="{{ url('category-delete/' . $value->id) }}" class="btn btn-danger btn-sm">Remove
                            Category</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
