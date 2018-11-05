<?php

namespace App\Http\Controllers;

use App\Events\JobDeletedEvent;
use App\Http\Requests\JobCreateRequest;
use App\Job;
use App\Http\Resources\JobResource;
use App\Events\JobCreated;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource. This function will show all jobs,
     * so we should probably leave it for the frontend page ONLY.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $jobs = Job::paginate(15);
        $user = Auth::user()->load(['companies', 'companies.jobs']);
//        //        var_dump($user);
//        //        die;
//        $user = (new \App\User)->with('companies')->where('id', $user->id)->get();
        var_dump($user);
        die();
//        if(Auth::user() && $user->companies != null) {
//            $jobs = $user->companies->jobs;
//        }
        return JobResource::collection($jobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobCreateRequest $request
     * @return JobResource
     */
    public function store(JobCreateRequest $request)
    {
        $job = $request->isMethod('put') ? Job::findOrFail($request->get('job_id')) : new Job;

        $job->id = $request->get('job_id');
        $job->title = $request->get('name');
        $job->description = $request->get('description');
        $job->category_id = $request->get('category');
        $job->company_id = 1;

        if($job->save()) {
            event(new JobCreated($job));
            return new JobResource($job);
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return JobResource
     */
    public function show(Job $job)
    {
        return new JobResource($job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        event(new JobDeletedEvent($job));
    }
}
