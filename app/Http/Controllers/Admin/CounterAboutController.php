<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CounterAboutRequest;
use App\Http\Requests\Admin\CounterSectionRequest;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\PartnerRequest;
use App\Http\Resources\Admin\CounterSectionResource;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\PartnerResource;
use App\Models\CounterAbout;
use App\Models\CounterSection;
use App\Models\HomeSlider;
use App\Models\Partner;
use App\Models\TwoAbout;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CounterAboutController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.counter-about.index');
    }

    public function index(Request $request)
    {
        $counterSections = CounterAbout::paginate(10);
        return responseJson(CounterSectionResource::collection($counterSections->items()),'',200,getPaginates($counterSections));
    }

    public function store(CounterAboutRequest $request)
    {
        $counterSection = CounterAbout::create($request->validated());
        $counterSection->setTranslations($request->translations);
        saveFiles($request->image,$counterSection,"counterSection");
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $counterSection = CounterAbout::with(['translations'])->find($id);
        return responseJson($counterSection,'Data exited successfully',200);
    }

    public function update(CounterSectionRequest $request, CounterAbout $counterAbout)
    {
        $counterAbout->update($request->validated());
        $counterAbout->setTranslations($request->translations);
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(CounterSection $counterAbout)
    {
        deleteFile($counterAbout);
        $counterAbout->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
