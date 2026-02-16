<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ContactMessageRequest;
use App\Http\Requests\Client\SubscribeRequest;
use App\Models\ContactMessage;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::first();
        $services = Service::with('image')->whereStatus(1)->take(4)->get();
        return view('website.contact',compact('setting','services'));
    }

     public function store(ContactMessageRequest $request)
    {
        $validated = $request->validated();

        ContactMessage::create($validated);

        return response()->json(['success' => true, 'message' => __('website.Message Send Successfully.')]);
    }

    public function subscribe(SubscribeRequest $request)
    {
        $validated = $request->validated();

        if(!Subscribe::whereEmail($validated['email'])->first()) {
            Subscribe::create($validated);
        }

        return response()->json(['success' => true, 'message' => __('website.Message Send Successfully.')]);
    }

}
