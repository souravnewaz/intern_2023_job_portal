@extends('layouts.app')
@section('title', 'Jobs')
@section('content')
<div class="row my-2">
    <div class="col-12 bg-white p-3 rounded">
        <form class="row g-3 ">

            <div class="col-12 col-md-4">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="type job title" name="title" value="{{ request()->title }}">
            </div>

            <div class="col-12 col-md-2">
                <label>Select Category</label>
                <select class="form-select" name="category">
                    <option value="">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-3">
                <label>Select Company</label>
                <select class="form-select" name="company">
                    <option value="">All</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ request()->company == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-2">
                <label>Employment Type</label>
                <select class="form-select" name="employment_type">
                    <option value="">All</option>
                    <option value="full_time" {{ request()->employment_type == 'full_time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part_time" {{ request()->employment_type == 'part_time' ? 'selected' : '' }}>Part Time</option>
                </select>
            </div>

            <div class="col-12 col-md-1">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    @foreach ($jobs as $job)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex flex-column flex-lg-row">
                    <img src="{{ asset($job->company->image) }}" alt="company" height="64">
                    <div class="row flex-fill">
                        <div class="col-sm-5">
                            <h4 class="h5">{{ $job->title }}</h4>
                            <span class="text-secondary">{{ $job->company->name }}</span>
                            <p class="text-secondary">{{ $job->location }}</p>
                        </div>
                        <div class="col-sm-4 py-2">
                            <p class="badge bg-secondary">{{ $job->category->name }}</p> <br>
                            <p class="badge bg-success">{{ $job->salary_starts }} - {{ $job->salary_ends }}</p>
                            <?php
                                $employment_status = $job->employment_status;
                                $employment_status = str_replace('_', ' ', $employment_status);
                                $employment_status = ucfirst($employment_status);
                            ?>
                            <p class="text-secondary">{{ $employment_status }}</p>
                        </div>
                        <div class="col-sm-3 text-lg-end">
                            @if(auth()->check() && auth()->user()->role == 'user')
                            <!-- <a href="#" class="btn btn-success btn-sm">Apply</a> -->
                            @endif
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="text-center">
        {{ $jobs->links() }}
    </div>

    @if($jobs->count() == 0)
    <div class="alert alert-dark" role="alert">
        Sorry, No jobs found!
    </div>
    @endif
</div>

@endsection