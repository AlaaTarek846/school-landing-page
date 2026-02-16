<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\TestimonialResource;
use App\Models\HomeSlider;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.testimonials.index');
    }

    public function index(Request $request)
    {
        $testimonials = Testimonial::with('media')->paginate(10);
        return responseJson(TestimonialResource::collection($testimonials->items()),'',200,getPaginates($testimonials));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(TestimonialRequest $request)
    {
        $testimonial = Testimonial::create(Arr::except($request->validated(),['image']));
        if ($request->hasFile('image'))
            saveFiles($request->image,$testimonial,"testimonial");

        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $homeSlider = Testimonial::with(['media'])->find($id);
        return responseJson($homeSlider,'Data exited successfully',200);
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        if ($request->hasFile('image')) 
            saveFiles($request->image,$testimonial,"testimonial",null,'update');

        $testimonial->update(Arr::except($request->validated(),['image']));
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Testimonial $testimonial)
    {
        deleteFile($testimonial);
        $testimonial->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
