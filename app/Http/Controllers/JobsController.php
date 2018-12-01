<?php /** @noinspection PhpParamsInspection */

/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Events\JobCreated;
use App\Events\JobDeletedEvent;
use App\Http\Requests\JobCreateRequest;
use App\Job;
use App\Http\Resources\JobResource;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource. This function will show all jobs,
     * so we should probably leave it for the frontend page ONLY.
     * YAY!!! \(-_-)/
     *
     * @return array
     */
    public function index()
    {
        $jobs = Job::paginate(15);
        $collection = JobResource::collection($jobs);
//        This is how filtering by company or category should work, so I should
//        probably employ this in filtering for the user details or some other
//        useful view
        $filteredCollection = $collection->filter(function($item) {
            if($item->company->id == 21) {
                return $item;
            }
        })->values(); // Man-up and do it, I can't f***ing hold your hand forever!
        return $filteredCollection;
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
