<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OneAbout;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
class AboutController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::first();
        $teams = Team::get();
        $oneAbout = OneAbout::with('details')->first();
        return view('website.about',compact('teams','setting','oneAbout'));
    }

}
