@extends('layouts.app')
@section('content')

<div class="row mt-3">
    <div class="col-12">
        <form action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="type job title">
                <button class="btn btn-primary" type="button">Search</button>
            </div>
        </form>
    </div>
    <div class="col-12">
        <h6>Browse By Category</h6>
    </div>
    @foreach ($categories as $category)
        <div class="col-md-3 mb-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ $category->name }}</h6>
                    <a href="/jobs">
                        <h6 class="card-subtitle mb-2 text-muted small">See {{ $category->name }} Jobs</h6>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection