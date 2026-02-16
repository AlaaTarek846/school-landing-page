<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\TeamRequest;
use App\Http\Resources\Admin\GalleryResource;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\PartnerResource;
use App\Http\Resources\Admin\TeamResource;
use App\Models\Gallery;
use App\Models\HomeSlider;
use App\Models\Partner;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.gallery.index');
    }

    public function index(Request $request)
    {
        $gallery = Gallery::with('media')->paginate(10);
        return responseJson(GalleryResource::collection($gallery->items()),'',200,getPaginates($gallery));
    }

    public function store(GalleryRequest $request)
    {
        $gallery = Gallery::create(Arr::except($request->validated(),['image']));
        saveFiles($request->image,$gallery,"gallery",'image');
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $gallery = Gallery::with(['media'])->find($id);
        return responseJson($gallery,'Data exited successfully',200);
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        if ($request->hasFile('image')) 
            saveFiles($request->image,$gallery,"gallery",'image','update');


        $gallery->update(Arr::except($request->validated(),['image']));
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Gallery $gallery)
    {
        deleteFile($gallery);
        $gallery->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
