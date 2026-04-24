<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(){
        $applications = Auth::user()->applications()->with(['job.employer', 'job.tags'])->latest()->paginate(6);
        return view('applications.index', ['applications' => $applications]);
    }

    public function store(Job $job){
        // prevent duplicates
        $user = Auth::user();
        if($job->applications()->where('user_id', $user->id)->exists()){
            return back()->with('error', 'You already applied for this job.');
        }
        
        // create application
        $job->applications()->create([
            'user_id' => $user->id,
        ]);

        // redirect
        return back()->with('success', 'Application submitted.');
    }

    // public function show(Job $job){
    //     // recieve job

    //     // auth (employer owns job)
    //     $this->authorize('viewApplication', $job);
      
    //     dd('approved employer');
        
        
    //     // load job application
        
    // }
}
