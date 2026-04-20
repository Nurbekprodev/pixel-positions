<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        return view('jobs.index', [
            'jobs' => $jobs[0],
            'featuredJobs' => $jobs[1],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required'],
            'tags' => ['nullable', 'string'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if($attributes['tags'] ?? false){
            foreach(explode(',', $attributes['tags']) as $tag){
                $job->tag($tag);
            }
        }

        return redirect('/');
    }

    public function show(Job $job){
        return view('jobs.show' , ['job' => $job]);
    }

    public function edit(Job $job){
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job){
        Gate::define('edit-job', function (User $user, Job $job){
            return $job->employer->user->is($user);
        }); 

        Gate::authorize('edit-job', $job);

        // validate
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required'],
            'tags' => ['nullable', 'string'],
        ]);

        $attributes['featured'] = $request->has('featured');

        // auth

        // update the job
        $job->update(Arr::except($attributes, 'tags'));

        // sync tags
        if($attributes['tags'] ?? false){
            $job->tags()->detach();

            foreach(explode(', ', $attributes['tags']) as $tag){
                $job->tag(trim($tag));
            }
        }

        // redirect
        return redirect('/jobs/' . $job->id);
    }
}

