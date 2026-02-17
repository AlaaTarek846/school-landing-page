<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ContactMessageRequest;
use App\Models\ContactMessage;

use App\Models\Setting;
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
        return view('website.contact',compact('setting'));
    }

     public function store(ContactMessageRequest $request)
    {
        $validated = $request->validated();

        ContactMessage::create($validated);

        return response()->json(['success' => true, 'message' => __('website.Message Send Successfully.')]);
    }



}
