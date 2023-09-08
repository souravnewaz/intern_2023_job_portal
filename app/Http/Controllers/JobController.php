<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobDetail;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $companies = Company::get();

        $title = request()->title;
        $category_id = request()->category;
        $company_id = request()->company;
        $employment_type = request()->employment_type;

        $jobs = Job::query();

        if($title) {
            $jobs->where('title', 'like', '%'.$title.'%');
        }

        if($category_id) {
            $jobs->where('category_id', $category_id);
        }

        if($company_id) {
            $jobs->where('company_id', $company_id);
        }

        if($employment_type) {
            $jobs->where('employment_status', $employment_type);
        }

        $jobs = $jobs->paginate(10);

        return view('jobs.index', compact('categories', 'companies', 'jobs'));
    }

    public function show($job_id)
    {
        $job = Job::with('company', 'category')->find($job_id);

        $job['responsibilities'] = JobDetail::where('job_id', $job->id)->where('type', 'responsibility')->get();
        $job['educations'] = JobDetail::where('job_id', $job->id)->where('type', 'education')->get();
        $job['experiences'] = JobDetail::where('job_id', $job->id)->where('type', 'experience')->get();
        $job['additionals'] = JobDetail::where('job_id', $job->id)->where('type', 'additional')->get();
        $job['benifits'] = JobDetail::where('job_id', $job->id)->where('type', 'benifit')->get();

        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        $companies = Company::get();
        $categories = Category::get();
        
        return view('jobs.create', compact('companies', 'categories'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'category_id' => 'required',
            'company_id' => 'required',
            'title' => 'required|string|min:4|max:100',
            'location' => 'required|string|min:4|max:100',
            'vacancy' => 'required|numeric|min:1',
            'experience' => 'required|numeric|min:0',
            'min_age' => 'required|numeric|min:10',
            'max_age' => 'required|numeric|min:10',
            'salary_starts' => 'required|numeric',
            'salary_ends' => 'required|numeric',
            'deadline' => 'required|date',
            'employment_status' => 'required|string',
        ]);

        Job::create($input);

        return redirect()->back()->with('success', 'Job posted successfully');
    }

    public function jobList()
    {
        $jobs = Job::with('category', 'company')->orderBy('id', 'DESC')->paginate(10);

        return view('jobs.list', compact('jobs'));
    }

    public function applicationForm($job_id)
    {
        $job = Job::find($job_id);
        $user = auth()->user();

        return view('jobs.applicationForm', compact('job', 'user'));
    }

    public function apply(Request $request, $job_id)
    {
        $user_id = auth()->user()->id;

        $alreadyApplied = JobApplication::where('job_id', $job_id)->where('user_id', $user_id)->exists();

        if($alreadyApplied) {
            return redirect()->back()->with('error', 'You have already applied to this job.');
        }

        $input = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|min:7|max:14',
            'experience' => 'required|string',
            'message' => 'nullable|string|max:500',
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        $input['user_id'] = $user_id;
        $input['job_id'] = $job_id;

        $fileName = time().'.'.$request->cv->extension();
        $request->cv->move(public_path('uploads'), $fileName);
        $path = 'uploads/'.$fileName;

        $input['cv'] = $path;

        JobApplication::create($input);
        
        return redirect()->back()->with('success', 'Application Successful');
    }

    public function applications()
    {
        $user = auth()->user();

        $applications = JobApplication::query();

        if($user->role == 'user') {
            $applications->where('user_id', $user->id);
        }

        $applications = $applications->with('job.company', 'job.category')->paginate(10);

        return view('jobs.applications', compact('applications'));
    }
}
