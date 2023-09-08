@extends('layouts.app')
@section('title', 'Create Job')

@section('content')

<div class="row mt-3 mx-0 justify-content-center">
    <div class="col-md-7">
        <form method="POST" class="w-100 rounded-1 p-4 border bg-white" enctype="multipart/form-data" action="">
            @CSRF
            <h5>Create Job</h5>
            <label class="d-block my-4">
                <span class="form-label d-block">Job title</span>
                <input required name="title" type="text" class="form-control" />
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Location</span>
                <input required name="location" type="text" class="form-control" />
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Category</span>
                <select required name="category" class="form-select">
                    @foreach ($categories as $category)
                        <option>{{ $category->name }}</option>
                    @endforeach
                </select>
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Company</span>
                <select required name="company" class="form-select">
                    @foreach ($companies as $company)
                        <option>{{ $company->name }}</option>
                    @endforeach
                </select>
            </label>

            <div>
                @include('flash-message')
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success px-3 rounded-3">
                    Post Job
                </button>
            </div>
        </form>
    </div>
</div>


@endsection