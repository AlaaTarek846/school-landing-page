<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ContactMessageResource;
use App\Models\ContactMessage;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.contactMessage.index');
    }

    public function index(Request $request)
    {
        $contactMessages = ContactMessage::paginate(10);
        return responseJson(ContactMessageResource::collection($contactMessages->items()),'',200,getPaginates($contactMessages));
    }



    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
