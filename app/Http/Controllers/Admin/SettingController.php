<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqSectionRequest;
use App\Http\Requests\Admin\SettingRequest;
use App\Http\Resources\Admin\FaqSectionResource;
use App\Http\Resources\Admin\SettingResource;
use App\Models\FaqSection;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.setting.index');
    }

    public function index(Request $request)
    {
        $settings = Setting::paginate(10);
        return responseJson(SettingResource::collection($settings->items()),'',200,getPaginates($settings));
    }

    public function show($id)
    {
        $setting = Setting::find($id);
        return responseJson($setting,'Data exited successfully',200);
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update(Arr::except($request->validated(),['translations']));
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
