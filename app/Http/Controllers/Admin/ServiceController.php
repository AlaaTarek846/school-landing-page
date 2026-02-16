<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\ServiceResource;
use App\Models\HomeSlider;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.services.index');
    }

    public function index(Request $request)
    {
        $services = Service::with('image')->paginate(10);
        return responseJson(ServiceResource::collection($services->items()),'',200,getPaginates($services));
    }

    public function create(): View
    {
        return view('admin.homeSliders.create');
    }

    public function store(ServiceRequest $request)
    {
        $service = Service::create($request->validated());
        saveFiles($request->image,$service,"service");
         if(isset($request->image)) {
            saveFiles($request->image, $service, 'service', "image");
        }
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $service = Service::with(['translations','image'])->find($id);
        return responseJson($service,'Data exited successfully',200);
    }

    public function update(ServiceRequest $request, Service $service)
    {    
        if($request->hasFile('image')) {

            saveFiles($request->image, $service, 'service', "image",'update');
        }
        $service->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Service $service)
    {
        deleteFile($service);
        $service->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown( )
    {
        $services = Service::select('id','title_ar as title')->get();
        return responseJson($services,'Data exited successfully',200);
    }


}
