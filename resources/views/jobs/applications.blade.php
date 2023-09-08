@extends('layouts.app')
@section('title', 'Application List')
@section('content')

<div class="card mt-3">
    <div class="card-header">
        <h5>Applications</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Date</th>
                <th>Job Details</th>
                <th>Applicant Details</th>
                <th>CV</th>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->created_at->format('d M Y') }}</td>
                        <td>
                            <p class="mb-0"><strong>{{ $application->job->title }}</strong></p>
                            <p class="mb-0"><strong>Company: </strong>{{ $application->job->company->name }}</p>
                            <p class="mb-0"><strong>Category: </strong>{{ $application->job->category->name }}</p>
                        </td>
                        <td>
                            <p class="mb-0"><strong>Name: </strong>{{ $application->name }}</p>
                            <p class="mb-0"><strong>Email: </strong>{{ $application->email }}</p>
                            <p class="mb-0"><strong>Phone: </strong>{{ $application->phone }}</p>
                            <p class="mb-0"><strong>Experience: </strong>{{ $application->experience }}</p>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ asset($application->cv) }}">Download</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $applications->links() }}
    </div>
</div>

@endsection