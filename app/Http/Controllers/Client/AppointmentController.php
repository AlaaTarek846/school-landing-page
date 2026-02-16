<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Setting;

class AppointmentController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::first();
        $services = Service::with('icon','image')->whereStatus(1)->orderBy('sort','asc')->get();
        return view('website.appointment',compact('setting','services'));
    }

    public function store(AppointmentRequest $request)
    {
        $validated = $request->validated();

        Appointment::create($validated);

       return response()->json(['success' => true, 'message' => __('website.Message Send Successfully.')]);
    }

}
