@extends('layouts.app')
@section('title', 'Application Form')

@section('content')

<div class="row mt-3 mx-0 justify-content-center">
    <div class="col-md-7">
        <form method="POST" class="w-100 rounded-1 p-4 border bg-white" enctype="multipart/form-data" action="{{ route('jobs.apply', $job->id) }}">
            @CSRF
            <h5>Apply to {{ $job->title }}</h5>
            <label class="d-block my-4">
                <span class="form-label d-block">Your name</span>
                <input required name="name" type="text" class="form-control" value="{{ $user->name }}"/>
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Email address</span>
                <input required name="email" type="email" class="form-control" value="{{ $user->email }}"/>
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Phone</span>
                <input required name="phone" type="text" class="form-control" placeholder="+8801111111111"/>
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Years of experience</span>
                <select required name="experience" class="form-select">
                    <option>Less than a year</option>
                    <option>1 - 2 years</option>
                    <option>2 - 4 years</option>
                    <option>4 - 7 years</option>
                    <option>7 - 10 years</option>
                    <option>10+ years</option>
                </select>
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Tell us more about yourself</span>
                <textarea name="message" class="form-control" rows="3" placeholder="Why should we hire you?"></textarea>
                <span class="form-text">
                    max 500 words
                </span>
            </label>

            <label class="d-block mb-4">
                <span class="form-label d-block">Your CV</span>
                <input required name="cv" type="file" class="form-control" />
                <span class="form-text">
                    File format must be PDF
                </span>
            </label>

            <div>
                @include('flash-message')
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success px-3 rounded-3">
                    Apply
                </button>
            </div>
        </form>
    </div>
</div>


@endsection