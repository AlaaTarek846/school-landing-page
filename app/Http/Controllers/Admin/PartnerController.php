<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\PartnerRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\PartnerResource;
use App\Models\HomeSlider;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.partners.index');
    }

    public function index(Request $request)
    {
        $partners = Partner::with('media')->paginate(10);
        return responseJson(PartnerResource::collection($partners->items()),'',200,getPaginates($partners));
    }

    public function store(PartnerRequest $request)
    {
        $partner = Partner::create(Arr::except($request->validated(),['image']));
        saveFiles($request->image,$partner,"partner");
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $partner = Partner::with(['media'])->find($id);
        return responseJson($partner,'Data exited successfully',200);
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        if ($request->hasFile('image')) 
            saveFiles($request->image,$partner,"partner",null,'update');

        $partner->update(Arr::except($request->validated(),['image']));
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Partner $partner)
    {
        deleteFile($partner);
        $partner->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
