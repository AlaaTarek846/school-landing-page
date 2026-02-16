<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
class EventController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view('website.event');
    }

    public function details()
    {

        return view('website.eventDetails');
    }

}
