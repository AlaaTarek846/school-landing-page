<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\TeamRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\PartnerResource;
use App\Http\Resources\Admin\TeamResource;
use App\Models\HomeSlider;
use App\Models\Partner;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.teams.index');
    }

    public function index(Request $request)
    {
        $teams = Team::with('media')->paginate(10);
        return responseJson(TeamResource::collection($teams->items()),'',200,getPaginates($teams));
    }

    public function store(TeamRequest $request)
    {
        $team = Team::create(Arr::except($request->validated(),['image']));
        saveFiles($request->image,$team,"team");
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $team = Team::with(['media'])->find($id);
        return responseJson($team,'Data exited successfully',200);
    }

    public function update(TeamRequest $request, Team $team)
    {
        if ($request->hasFile('image')) 
            saveFiles($request->image,$team,"team",null,'update');

        $team->update(Arr::except($request->validated(),['image']));
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Team $team)
    {
        deleteFile($team);
        $team->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
