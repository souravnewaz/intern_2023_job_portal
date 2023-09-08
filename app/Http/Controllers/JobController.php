<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $companies = Company::get();

        $jobs = Job::paginate(10);

        return view('jobs', compact('categories', 'companies', 'jobs'));
    }

    public function create()
    {

    }

    public function store()
    {

    }
}
