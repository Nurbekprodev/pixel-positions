<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
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
}
