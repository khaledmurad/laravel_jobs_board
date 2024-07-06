<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job_application.index',[
            'applications' => auth()->user()->jobApplication()->with([
                'job' => function ($q) {
                    $q->withCount('jobApplication')->withAvg('jobApplication','expected_salary');
                },
                'job.employer'
                ])->latest()->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with('success','Your job application removed');
    }
}
