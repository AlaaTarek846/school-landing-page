<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $propertyTypes = PropertyType::whereStatus(1)->with('media')->get();
        return view('website.project',compact('propertyTypes'));
    }
    public function show($slug)
    {    
//          $project = Project::with(['media'])->where('slug_ar',$slug)->orWhere('slug_en',$slug)->firstOrFail();
//
//       // المشروع السابق (أقل من ID الحالي)
//        $previousProject = Project::where('status', 1)
//            ->where('id', '<', $project->id)
//            ->orderBy('id', 'desc')
//            ->first();
//
//        // المشروع التالي (أكبر من ID الحالي)
//        $nextProject = Project::where('status', 1)
//            ->where('id', '>', $project->id)
//            ->orderBy('id', 'asc')
//            ->first();
//
//
//            $setting = Setting::first();
//            $servicesFooter = Service::with('icon')->whereStatus(1)->take(4)->orderBy('sort','asc')->get();
        return view('website.projectDetails');

    }

}
