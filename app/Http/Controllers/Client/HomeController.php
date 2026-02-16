<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CounterSection;
use App\Models\Faq;
use App\Models\FaqSection;
use App\Models\HomeSlider;
use App\Models\OneAbout;
use App\Models\Partner;
use App\Models\Project;
use App\Models\PropertyType;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\WhyChooseUs;
use App\Models\EducationalStage;
use App\Models\CampusTour;

class HomeController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $homeSliders = HomeSlider::get();
        $services = Service::whereStatus(1)->take(4)->get();
        $propertyTypes = PropertyType::get();

        $testimonials = Testimonial::whereStatus(1)->get();
        $setting = Setting::first();
        foreach ($services as $service) {
            $service->description_ar = Str::substr($service->description_ar, -84);
            $service->description_en = Str::substr($service->description_en, -84);
        }

        $projects = Project::with('media')->whereStatus(1)->inRandomOrder()->limit(3)->get();
        foreach ($projects as $project) {
            $project->description = Str::substr($project->description, -84);
        }
        $articles = Article::latest()->limit(3)->get();


        $whyChooseUs = WhyChooseUs::all();
        $educationalStages = EducationalStage::with('classes')->get();
        $campusTours = CampusTour::all();

        return view('website.home',compact('homeSliders','propertyTypes','setting','articles','testimonials','services','projects', 'whyChooseUs', 'educationalStages', 'campusTours'));
    }

}
