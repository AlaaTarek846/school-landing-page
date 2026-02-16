<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\OneAboutRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\OneAboutResource;
use App\Models\AboutDetail;
use App\Models\HomeSlider;
use App\Models\LanguageTranslation;
use App\Models\OneAbout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class OneAboutController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.oneAbout.index');
    }

    public function index(Request $request)
    {
        $oneAbouts = OneAbout::with('firstPhoto')->paginate(10);
        return responseJson(OneAboutResource::collection($oneAbouts->items()),'',200,getPaginates($oneAbouts));
    }

    public function show($id)
    {
        $oneAbout = OneAbout::with(['details','firstPhoto'])->find($id);
        return responseJson($oneAbout,'Data exited successfully',200);
    }

    public function update(OneAboutRequest $request, OneAbout $oneAbout)
    {
        $data = $request->validated();
        if(isset($data['first_photo'])) {
            saveFiles($data['first_photo'], $oneAbout, 'oneAbout', "first_photo",'update');
        }

        $oneAbout->update(Arr::except($data,['details','first_photo']));
        foreach ($oneAbout->details() as $detail) {
            $detail->delete();
        }
        $oneAbout->details()->delete();
        foreach ($data['details'] as $detail) {
            $d = AboutDetail::create(array_merge(['one_about_id' => $oneAbout->id],$detail));
        }
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(OneAbout $oneAbout)
    {
        deleteFile($oneAbout);
        $oneAbout->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
