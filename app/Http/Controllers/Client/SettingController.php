<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CounterAbout;
use App\Models\CounterSection;
use App\Models\OneAbout;
use App\Models\Partner;
use App\Models\Policy;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\TwoAbout;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
class SettingController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function policy()
    {
        $policy = Policy::where('type','privacy')->first();
        return view('website.policy',compact('policy'));
    }

    public function termCondition()
    {
        $term = Policy::where('type','terms')->first();
        return view('website.termCondition',compact('term'));
    }

}
