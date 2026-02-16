<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TwoAboutRequest;
use App\Http\Resources\Admin\TwoAboutResource;
use App\Models\TwoAbout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TwoAboutController extends Controller
{

    public function indexPage(Request $request)
    {
        return view('admin.twoAbout.index');
    }

    public function index(Request $request)
    {
        $twoAbouts = TwoAbout::with('media')->paginate(10);
        return responseJson(TwoAboutResource::collection($twoAbouts->items()),'',200,getPaginates($twoAbouts));
    }

    public function store(TwoAboutRequest $request): RedirectResponse
    {
        $twoAbout = TwoAbout::create($request->validated());
        $twoAbout->setTranslations($request->translations);
        saveFiles($request->image,$twoAbout,"twoAbout");
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $twoAbout = TwoAbout::with(['media','translations'])->find($id);
        return responseJson($twoAbout,'Data exited successfully',200);
    }

    public function update(TwoAboutRequest $request, TwoAbout $twoAbout)
    {
        if ($request->hasFile('image')) 
            saveFiles($request->image,$twoAbout,"twoAbout",null,'update');

        $twoAbout->update($request->validated());
        $twoAbout->setTranslations($request->translations);
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(TwoAbout $twoAbout)
    {
        deleteFile($twoAbout);
        $twoAbout->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
