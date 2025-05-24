<?php

use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\job;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;


Route::get('test', function () {
    // dispatch(function(){
    //     // logger('Hello from queue');
    //     logger('Hello from queue');
    // })->delay(5);
    $job =job::first();
TranslateJob::dispatch($job);

   return 'Okay';
});

// Route::get('test',function(){
//     \Illuminate\Support\Facades\Mail::to('sousdey716@gmail.com')->send(new App\Mail\JobPosted());
//     return 'Done';
// });
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return 'About Us';
// });

// Route::get('/', function () {
//     return view('home', ['greeting' => 'Sousdey']);
// });

// class job {
//     public static function all(){
//         return [
//             ['id' => 1, 'title' => 'Director', 'salary' => '$1000'],
//             ['id' => 2, 'title' => 'IT', 'salary' => '$800'],
//             ['id' => 3, 'title' => 'Teacher', 'salary' => '$500']
//         ];
//     }
// }

// $jobs = [
//     ['id' => 1, 'title' => 'Director', 'salary' => '$1000'],
//     ['id' => 2, 'title' => 'IT', 'salary' => '$800'],
//     ['id' => 3, 'title' => 'Teacher', 'salary' => '$500']
// ];


//create Route group
// Route::controller(JobController::class)->group(function(){
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create',  'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });
// Route::resource('jobs', JobController::class);

// Route::resource('jobs', JobController::class)->middleware('auth');
// Route::resource('jobs', JobController::class)->only(['index','show']); // no need sign in
// Route::resource('jobs', JobController::class)->except(['index','show'])->middleware('auth');


Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth', 'can:edit_job,job');
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
//     ->middleware('auth')
//     ->can('edit_job', 'job');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');
    
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');

// Route::resource('jobs', JobController::class, [
//     'except'=> ['edit']
// ]);


//view
Route::view('/', 'home', ['greeting' => 'Sousdey']);

// Route::get('/', function () {
//      return view('home', ['greeting' => 'Sousdey']);
//     // $job = job::all();
//     // dd($job[0]-> title);
// });


// index_show all jobs

// Route::get('/jobs',[JobController::class, 'index']);

// Route::get('/jobs', function () {
//     // $job = job::with('employer')->get();
//     // $job = job::with('employer')->paginate(3);
//      $job = job::with('employer')->latest()->simplepaginate(3);
//     //  $job = job::with('employer')->cursorPaginate(3);



//     // return view('jobs', ['jobs' => job::all()]);
//      return view('jobs.index', ['jobs' => $job]);
// });


//create
// Route::get('/jobs/create', [JobController::class, 'create']);

// must put the /jobs/create before /jobs/{id} to avoid conflict
// Route::get('/jobs/create', function () {
//     return view('jobs.create');
    
// });

// show
// Route::get('/jobs/{job}', [JobController::class,'show']);
// Route::get('/jobs/{id}', function ($id) {
//     //dd($id);
    
    
//     // $job = Arr:: first(Job::all(),
//     // //function($job) use ($id){return  $job['id'] == $id;}
//     // //fn (called arrow function): Automatically inherit variables from the outer scope and return value (no need for use)
//     // fn($job) => $job['id'] == $id

//     // );
//     $job = job::find($id);
//   return view('jobs.show', ['job' => $job]);
// });

// Route::get('/jobs/{job}', function (job $job) {
//     return view('jobs.show', ['job' => $job]);
// });

// store
// Route::post('/jobs', [JobController::class,'store']);

// Route::post('/jobs', function (){
//     // dd(request('Title'));
//     // dd(request()->all());
//     request()->validate([
//         'title'=>['required','min:3'],
//         'salary'=>['required']
//     ]);

//     job::create(
//         [
//             'title' => request('Title'),
//             'salary' => request('salary'),
//             'employer_id' => 1
//         ]);
//         return redirect('/jobs');
// });

// edit job
// Route::get('/jobs/{job}/edit', [JobController::class,'edit']);

// Route::get('/jobs/{job}/edit', function (job $job) {
//   return view('jobs.edit', ['job' => $job]);
// });

//update
// Route::patch('/jobs/{job}', [JobController::class,'update']);

// Route::patch('/jobs/{job}', function (job $job) {
//     //validate
//         request()->validate([
//             'Title'=>['required','min:3'], //Title: the name of the input field
//             'salary'=>['required']
//         ]);
//     //authorization(hold on...)
//     //update/persist (mean saving data to database)

//     // $job->title = request('title');
//     // $job->salary = request('salary');
//     // $job->save(); // save it to database

//     //other way to update
//     $job->update([
//         'title' => request('Title'),
//         'salary' => request('salary')
//     ]);
    
    //redirect to the job page
//     return redirect('/jobs/'.$job->id);

// });

//destroy
// Route::delete('/jobs/{job}', [JobController::class,'destroy']);

// Route::delete('/jobs/{job}', function (job $job) {
//     //authorization(hold on...)
//     //delete the job
//     // job::findOrFail($id)->delete();
//     // $job = job::findOrFail($id);
//     $job->delete();
//     //redirect
//     return redirect('/jobs');
// });

// view about page
Route::view('/about', 'about');
// Route::get('/about', function () {
//     return view('about');
// });

// view contact page
Route::view('/contact', 'contact');
// Route::get('/contact', function () {
//         return view('contact');
// });

Route::get('/array', function () {
    return ['foo' => 'bar'];
});

Route::get('/register',[RegisterUserController::class, 'create']);
Route::post('/register',[RegisterUserController::class, 'store']); //"If someone sends data to /register, run the store() method to process it."
 //Route::get('/login', [SessionController::class, 'create']);
Route::get('/login', [SessionController::class, 'create'])->name('login'); //name the route

Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);









