<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Company;
use App\Models\Property;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request,$slug)
    {

        $project = Project::where('slug_ar',$slug)->orWhere('slug_en',$slug)->firstOrFail();

        $query = Property::where('status',1)->with('photo')->whereHas('project',function ($q) use ($slug) {
            $q->where('slug_ar',$slug)->orWhere('slug_en',$slug);
        });

        if($request->area_id) {
            $query->where('area_id',$request->area_id);
        }

        if($request->search) {
            $query->orWhere('title_ar','like','%' . $request->search . '%')
                ->orWhere('title_en','like','%' . $request->search . '%');
        }


        $apartments = $query->paginate(10);

        $areas = Area::whereStatus(1)->get();

        return view('website.apartments',compact('project','apartments','areas'));
    }

    public function resail(Request $request)
    {
        $areas = Area::whereStatus(1)->get();
        $query = Property::where('status',1)->where('property_type_id',1)->with('photo');
        if($request->area_id) {
            $query->where('area_id',$request->area_id);
        }
        if($request->search) {
            $query->orWhere('title_ar','like','%' . $request->search . '%')
                  ->orWhere('title_en','like','%' . $request->search . '%');
        }

        $apartments = $query->paginate(10);

        return view('website.apartments',compact('apartments','areas'));
    }

    public function show($slug)
    {
        $apartment = Property::where('slug_ar',$slug)->orWhere('slug_en',$slug)->firstOrFail();
        return view('website.apartmentDetails',compact('apartment'));
    }

    public function areas()
    {
        $companies = Company::where('property_type_id',2)->with('media')->get();
        return view('website.areas',compact('companies'));
    }

    public function developments($slug)
    {

        $company = Company::where('slug_ar',$slug)->orWhere('slug_en',$slug)->firstOrFail();

        $projects = Project::where('status',1)->with('media')->whereHas('company',function ($q) use ($slug) {
            $q->where('slug_ar',$slug)->orWhere('slug_en',$slug);
        })->get();

        return view('website.developments',compact('projects','company'));
    }



}
