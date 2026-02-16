<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CounterSectionRequest;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\PartnerRequest;
use App\Http\Resources\Admin\CounterSectionResource;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\PartnerResource;
use App\Models\CounterSection;
use App\Models\HomeSlider;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CounterController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.counters.index');
    }

    public function index(Request $request)
    {
        $counterSections = CounterSection::paginate(10);
        return responseJson(CounterSectionResource::collection($counterSections->items()),'',200,getPaginates($counterSections));
    }

    public function store(CounterSectionRequest $request)
    {
        $counterSection = CounterSection::create(Arr::except($request->validated(),['image']));
        if ($request->hasFile('image'))
            saveFiles($request->image,$counterSection,"CounterSection");
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $counterSection = CounterSection::with(['media'])->find($id);
        return responseJson($counterSection,'Data exited successfully',200);
    }

    public function update(CounterSectionRequest $request, CounterSection $counter)
    {
        $counter->update(Arr::except($request->validated(),['image']));
        if ($request->hasFile('image'))
            saveFiles($request->image,$counter,"CounterSection",null,'update');
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(CounterSection $counter)
    {
        deleteFile($counter);
        $counter->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
