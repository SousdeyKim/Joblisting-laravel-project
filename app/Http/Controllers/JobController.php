<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;







class JobController extends Controller
{
    public function index(){
     $job = job::with('employer')->latest()->simplepaginate(3); 
 
      return view('jobs.index', ['jbs' => $job]);
    }
    public function create(){
        return view('jobs.create');
    }

    public function show(job $job){
        return view('jobs.show', ['job' => $job]);

    }

    public function store(Request $request){
        request()->validate([
            'Title'=>['required','min:3'],
            'salary'=>['required']
        ]);
   
        $job = job::create(
            [
                'title' => request('Title'),
                'salary' => request('salary'),
                'employer_id' => 1,
                
            ]);
            
            //  Mail::to('sousdey716@gmail.com')->send(new JobPosted($job));
             Mail::to($job->employer->user)->queue(new JobPosted($job));
            // Mail::to('sousdey716@gmail.com')->send(new App\Mail\JobPosted());
            return redirect('/jobs');
    }
    public function edit(job $job){
       
        // if(Auth::user()->cannot('edit_job', $job)){
        //     abort(403);
        // }
        

        // Gate::define('edit_job', function (User $user, job $job) {
        //     return $job->employer->user->is($user); // return as boolean
        // });

        // if(Auth::guest()){
        //     return redirect('/login');
        // }

         //Gate::authorize('edit_job', $job);

        // if (Gate::denies('edit_job', $job)) {
        //     abort(403); // personally handle the response 
        // }

        // if($job->employer->user->isNot(Auth::user())){
        //     abort(403);
        // }
        return view('jobs.edit', ['job' => $job]);

    }
    public function update(job $job){
        //Gate::authorize('edit_job', $job);
        request()->validate([
            'Title'=>['required','min:3'], //Title: the name of the input field
            'salary'=>['required']
        ]);
        $job->update([
            'title' => request('Title'),
            'salary' => request('salary')
        ]);
         return redirect('/jobs/'.$job->id);

    }

    // how the update function above works (Example)
    //1. Matches the route /jobs/5 with PATCH method
    //2. Finds job with ID 5 via route model binding
    //3.  Calls update(Job $job) with that job
    //4. Validates the input
    //5. Updates the job in the database 


    public function destroy(job $job){
        //Gate::authorize('edit_job', $job);
        $job->delete();
        return redirect('/jobs');
    }
    
}

