@extends('layouts.app')
@section('title', 'Job Details')
@section('content')

<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h3 class="card-title text-success">{{ $job->title }}</h3>
                <h5>{{ $job->company->name }}</h5>
                <span class="badge bg-secondary">{{ $job->category->name }}</span>
                
                <div class="my-3">
                    <h6>Responsibilites</h6>
                    <ul class="small">
                        @foreach ($job->responsibilities as $responsibility)
                        <li>{{ $responsibility->title }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-3">
                    <h6>Education requirement</h6>
                    <ul class="small">
                        @foreach ($job->educations as $education)
                        <li>{{ $education->title }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-3">
                    <h6>Experience requirement</h6>
                    <ul class="small">
                        @foreach ($job->experiences as $experience)
                        <li>{{ $experience->title }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-3">
                    <h6>Additional</h6>
                    <ul class="small">
                        @foreach ($job->additionals as $additional)
                        <li>{{ $additional->title }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-3">
                    <h6>Benifits</h6>
                    <ul class="small">
                        @foreach ($job->benifits as $benifit)
                        <li>{{ $benifit->title }}</li>
                        @endforeach
                    </ul>
                </div>

                @if(auth()->check())
                    <a href="{{ route('jobs.applicationForm', $job->id) }}" class="btn btn-success btn-block">Apply Now</a>
                @else
                    <h6 class="text-danger">Login to Apply</h6>
                @endif
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h6>Job Summary</h6>
                            <span>Posted on: {{ $job->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Vacancy</h6>
                            <p class="mb-0">{{ $job->vacancy }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Location</h6>
                            <p class="mb-0">{{ $job->location }}</p>
                        </div>
                        
                        <?php
                            $employment_status = $job->employment_status;
                            $employment_status = str_replace('_', ' ', $employment_status);
                            $employment_status = ucfirst($employment_status);
                        ?>

                        <div class="mb-3">
                            <h6>Employment Status</h6>
                            <p class="mb-0">{{ $employment_status }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Experience</h6>
                            <p class="mb-0">{{ $job->experience }} years</p>
                        </div>
                        <div class="mb-3">
                            <h6>Gender</h6>
                            <p class="mb-0">{{ $job->gender }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Salary Range</h6>
                            <p class="mb-0">{{ $job->salary_starts }} - {{ $job->salary_ends }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Age</h6>
                            <p class="mb-0">{{ $job->min_age }} to {{ $job->max_age }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Application Deadline</h6>
                            <p class="mb-0 text-danger">{{ $job->deadline }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection