<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index', [
     
            'featuredJobs' => Job::where('featured', true)->latest()->take(6)->get(),
            'latestJobs' => Job::latest()->take(6)->get(),
            'tags' => Tag::all(),
        ]);
    }
}
