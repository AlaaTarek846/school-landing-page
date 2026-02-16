<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ContactMessageRequest;
use App\Models\ContactMessage;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::first();
        $partners = Partner::whereStatus(1)->get();
        $services = Service::with('icon','image')->whereStatus(1)->orderBy('sort','asc')->get();
        return view('website.donate',compact('partners','setting','services'));
    }

     public function store(ContactMessageRequest $request)
    {
        $validated = $request->validated();

        ContactMessage::create($validated);

        return response()->json(['success' => true, 'message' => __('website.Message Send Successfully.')]);
    }

}
