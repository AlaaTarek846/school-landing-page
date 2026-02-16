<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ContactMessageResource;
use App\Http\Resources\Admin\SubscribeResource;
use App\Models\ContactMessage;
use App\Models\Subscribe;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.subscribe.index');
    }

    public function index(Request $request)
    {
        $contactMessages = Subscribe::paginate(10);
        return responseJson(SubscribeResource::collection($contactMessages->items()),'',200,getPaginates($contactMessages));
    }



    public function destroy(Subscribe $contactMessage)
    {
        $contactMessage->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
