@extends('layouts.app')
@section('title', 'Create Job')

@section('content')

<div class="row mt-3 mx-0 justify-content-center">
    <div class="col-md-7">
        <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="{{ route('jobs.store') }}">
            @CSRF
            <h5>Post New Job</h5>

            <div class="row">
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Select Category</span>
                        <select required name="category_id" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Select Company</span>
                        <select required name="company_id" class="form-select">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>

            <label class="d-block mb-4">
                <span class="form-label d-block">Job title</span>
                <input required name="title" type="text" class="form-control" placeholder="ex. Junior web developer"/>
            </label>

            <div class="row">
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Location</span>
                        <input required name="location" type="text" class="form-control" placeholder="Dhaka, Bangladesh"/>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Vaccancy</span>
                        <input required name="vacancy" type="number" class="form-control" placeholder="ex. 10"/>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Experience</span>
                        <input required name="experience" type="number" class="form-control" placeholder="ex. 10"/>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Select Gender</span>
                        <select name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="any">Any</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Min. Age</span>
                        <input required name="min_age" type="number" class="form-control" placeholder="ex. 22"/>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Max. Age</span>
                        <input required name="max_age" type="number" class="form-control" placeholder="ex. 35"/>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Salary starts from</span>
                        <input required name="salary_starts" type="number" class="form-control" placeholder="ex. 15000"/>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Max. Salary</span>
                        <input required name="salary_ends" type="number" class="form-control" placeholder="ex. 25000"/>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Employment Status</span>
                        <select name="employment_status" class="form-control">
                            <option value="part_time">Part Time</option>
                            <option value="full_time">Full Time</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Application Deadline</span>
                        <input type="date" name="deadline" class="form-control">
                    </label>
                </div>
            </div>
            
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