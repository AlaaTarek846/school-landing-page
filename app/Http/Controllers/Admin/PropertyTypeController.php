<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\OneAboutRequest;
use App\Http\Requests\Admin\PropertyTypeRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\OneAboutResource;
use App\Http\Resources\Admin\PropertyTypeResource;
use App\Models\AboutDetail;
use App\Models\HomeSlider;
use App\Models\LanguageTranslation;
use App\Models\OneAbout;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.propertyType.index');
    }

    public function index(Request $request)
    {
        $propertyTypes = PropertyType::with('media')->paginate(10);
        return responseJson(PropertyTypeResource::collection($propertyTypes->items()),'',200,getPaginates($propertyTypes));
    }

    public function show($id)
    {
        $propertyType = PropertyType::with(['media'])->find($id);
        return responseJson($propertyType,'Data exited successfully',200);
    }

    public function update(PropertyTypeRequest $request, PropertyType $propertyType)
    {
        $data = $request->validated();
        if(isset($data['image'])) {
            saveFiles($data['image'], $propertyType, 'propertyType', "image",'update');
        }
        $propertyType->update(Arr::except($data,['image']));
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(PropertyType $propertyType)
    {
        deleteFile($propertyType);
        $propertyType->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
