<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\ServiceFaqRequest;
use App\Http\Resources\Admin\ServiceFaqResource;
use App\Http\Resources\Admin\ServiceResource;
use App\Models\HomeSlider;
use App\Models\ServiceFaq;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ServiceFaqController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.serviceFaq.index');
    }

    public function index(Request $request)
    {
        $serviceFaqs = ServiceFaq::with('service')->paginate(10);
        return responseJson(ServiceFaqResource::collection($serviceFaqs->items()),'',200,getPaginates($serviceFaqs));
    }

    public function create(): View
    {
        return view('admin.homeSliders.create');
    }

    public function store(ServiceFaqRequest $request)
    {
        $serviceFaq = ServiceFaq::create($request->validated());
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $serviceFaq = ServiceFaq::find($id);
        return responseJson($serviceFaq,'Data exited successfully',200);
    }

    public function update(ServiceFaqRequest $request, ServiceFaq $serviceFaq)
    {    
        $serviceFaq->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(ServiceFaq $serviceFaq)
    {
        $serviceFaq->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
