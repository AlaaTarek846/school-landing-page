<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Models\HomeSlider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.homeSliders.index');
    }

    public function index(Request $request)
    {
        $homeSliders = HomeSlider::with('media')->paginate(10);
        return responseJson(HomeSliderResource::collection($homeSliders->items()),'',200,getPaginates($homeSliders));
    }

    public function create(): View
    {
        return view('admin.homeSliders.create');
    }

    public function store(HomeSliderRequest $request)
    {
        $homeSlider = HomeSlider::create(Arr::except($request->validated(),['image','image1']));
        if ($request->hasFile('image'))
            saveFiles($request->image,$homeSlider,"home-slider",'background');

        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $homeSlider = HomeSlider::with(['background','image'])->find($id);
        return responseJson($homeSlider,'Data exited successfully',200);
    }

    public function update(HomeSliderRequest $request, HomeSlider $homeSlider)
    {
        if ($request->hasFile('image')) 
            saveFiles($request->image,$homeSlider,"home-slider",'background','update');
        $homeSlider->update(Arr::except($request->validated(),['image','image1']));
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(HomeSlider $homeSlider)
    {
        deleteFile($homeSlider);
        $homeSlider->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
