<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CounterAbout;
use App\Models\CounterSection;
use App\Models\Faq;
use App\Models\OneAbout;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\TwoAbout;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::first();
        $faqs = Faq::get();
        return view('website.faqs',compact('faqs','setting'));
    }
}
