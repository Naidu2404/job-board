<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function __construct(){
        //Laravel will then automatically figure out that it needs to use the policy for this model and automatically
        // check for the specific abilities on the policy for this model for every single action.
        $this->authorizeResource( Employer::class);
    }
    public function create()
    {
        return view('employer.create');
    }
    public function store(Request $request)
    {
        //creating a company for the authorized user
        auth()->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|min:3|unique:employers,company_name',
            ])
        );

        return redirect()->route('jobs.index')
        ->with('success','Your employer account is created.');
    }
}
