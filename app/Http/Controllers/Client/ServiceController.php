<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CounterSection;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::with('image')->whereStatus(1)->get();

        return view('website.service',compact('services'));
    }

    public function show($slug)
    {

//        $setting = Setting::first();
        $service = Service::with(['image'])->where('slug_ar',$slug)->orWhere('slug_en',$slug)->firstOrFail();
        return view('website.serviceDetails',compact('service'));

    }

}
