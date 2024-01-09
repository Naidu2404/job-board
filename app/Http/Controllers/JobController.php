<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Job::class);

        //writing query for filtering
        $jobs = Job::query()->with('employer');

        //filtering with name
        $jobs->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%')
                    //quering for the employer who matches the search term
                    ->orWhereHas('employer', function ($query) {
                        $query->where('company_name','LIKE', '%' . request('search') . '%');
                    });
            });
        })->when(request('min_salary'), function ($query) {
            $query->where('salary', '>=', request('min_salary'));
        })->when(request('max_salary'), function ($query) {
            $query->where('salary', '<=', request('max_salary'));
        })->when(request('experience'),function($query) {
            $query->where('experience', '=', request('experience'));
        })->when(request('category'),function($query) {
            $query->where('category', '=', request('category'));
        });

        

        return view('job.index', ['jobs' => $jobs->latest()->get()]);
    }

    public function show(Job $job)
    {
        //
        $this->authorize('view', $job);
        return view('job.show', ['job' => $job->load('employer.jobs')]);
    }
}
