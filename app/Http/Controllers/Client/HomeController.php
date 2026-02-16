<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CampusTour;
use App\Models\EducationalStage;
use App\Models\HomeSlider;
use App\Models\Project;
use App\Models\PropertyType;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $homeSlider = HomeSlider::first();
        $services = Service::whereStatus(1)->take(4)->get();
        $propertyTypes = PropertyType::get();

        $testimonials = Testimonial::whereStatus(1)->get();

        $teams = Team::with('media')->take(4)->get();
        $whyChooseUs = WhyChooseUs::get();
        $educationalStages = EducationalStage::with('classes')->get();
        $campusTours = CampusTour::all();

        return view('website.home', compact('homeSlider', 'propertyTypes', 'testimonials', 'services', 'whyChooseUs', 'educationalStages', 'campusTours', 'teams'));
    }
}
