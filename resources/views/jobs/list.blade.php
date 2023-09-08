@extends('layouts.app')
@section('title', 'Job List')
@section('content')

<div class="card mt-3">
    <div class="card-header">
        <h5>jobs</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Category</th>
                <th>Company</th>
                <th>Title</th>
                <th>Details</th>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->category->name }}</td>
                        <td>{{ $job->company->name }}</td>
                        <td>{{ $job->title }}</td>
                        <td>
                            <p class="mb-0"><strong>Vacancy: </strong>{{ $job->vacancy }}</p>
                            <p class="mb-0"><strong>Experience: </strong>{{ $job->experience }}</p>
                            <p class="mb-0"><strong>Gender: </strong>{{ $job->gender }}</p>
                            <p class="mb-0"><strong>Type: </strong>{{ $job->employment_status }}</p>
                            <p class="mb-0"><strong>Age: </strong>{{ $job->min_age }} to {{ $job->max_age }}</p>
                            <p class="mb-0"><strong>Salary: </strong>{{ $job->salary_starts }} to {{ $job->salary_ends }}</p>
                            <p class="mb-0"><strong>Deadline: </strong>{{ $job->deadline }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $jobs->links() }}
    </div>
</div>

@endsection