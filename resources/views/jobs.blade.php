@extends('layouts.app')
@section('content')
<div class="row my-2">
    <div class="col-12 bg-white p-3 rounded">
        <form class="row g-3 ">
            <div class="col-12 col-md-3">
                <label>Select Category</label>
                <select class="form-select" name="category">
                    <option value="">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-4">
                <label>Select Company</label>
                <select class="form-select" name="company">
                    <option value="">All</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ request()->company == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-4">
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

@foreach ($jobs as $job)
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex flex-column flex-lg-row">
                <span class="avatar avatar-text rounded-3 me-4 mb-2">FD</span>
                <div class="row flex-fill">
                    <div class="col-sm-5">
                        <h4 class="h5">{{ $job->title }}</h4>
                        <span class="badge bg-secondary">WORLDWIDE</span> <span class="badge bg-success">$60K - $100K</span>
                    </div>
                    <div class="col-sm-4 py-2">
                        <span class="badge bg-secondary">REACT</span>
                        <span class="badge bg-secondary">NODE</span>
                        <span class="badge bg-secondary">TYPESCRIPT</span>
                        <span class="badge bg-secondary">JUNIOR</span>
                    </div>
                    <div class="col-sm-3 text-lg-end">
                        <a href="#" class="btn btn-primary stretched-link">Apply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="text-center">
    {{ $jobs->links() }}
</div>
<!-- <div class="container mt-3">
      
      <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex flex-column flex-lg-row">
            <span class="avatar avatar-text rounded-3 me-4 bg-warning mb-2">BE</span>
            <div class="row flex-fill">
              <div class="col-sm-5">
                <h4 class="h5">Senior Backend Engineer</h4>
                <span class="badge bg-secondary">US</span> <span class="badge bg-success">$90K - $180K</span>
              </div>
              <div class="col-sm-4 py-2">
                <span class="badge bg-secondary">GOLANG</span>
                <span class="badge bg-secondary">SENIOR</span>
                <span class="badge bg-secondary">ENGINEER</span>
                <span class="badge bg-secondary">BACKEND</span>
              </div>
              <div class="col-sm-3 text-lg-end">
                <a href="#" class="btn btn-primary stretched-link">Apply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex flex-column flex-lg-row">
            <span class="avatar avatar-text rounded-3 me-4 bg-info mb-2">PM</span>
            <div class="row flex-fill">
              <div class="col-sm-5">
                <h4 class="h5">Director of Product Marketing</h4>
                <span class="badge bg-secondary">WORLDWIDE</span> <span class="badge bg-success">$150K - $210K</span>
              </div>
              <div class="col-sm-4 py-2">
                <span class="badge bg-secondary">PRODUCT MARKETING</span>
                <span class="badge bg-secondary">MARKETING</span>
                <span class="badge bg-secondary">EXECUTIVE</span>
                <span class="badge bg-secondary">ECOMMERCE</span>
              </div>
              <div class="col-sm-3 text-lg-end">
                <a href="#" class="btn btn-primary stretched-link">Apply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
</div> -->
    @endsection