<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\ProjectChallengeSolutionRequest;
use App\Http\Resources\Admin\ProjectChallengeSolutionResource;
use App\Models\HomeSlider;
use App\Models\ProjectChallengeSolution;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProjectChallengeSolutionController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.projectChallengeSolution.index');
    }

    public function index(Request $request)
    {
        $projectChallengeSolutions = ProjectChallengeSolution::with('project')->paginate(10);
        return responseJson(ProjectChallengeSolutionResource::collection($projectChallengeSolutions->items()),'',200,getPaginates($projectChallengeSolutions));
    }

    public function create(): View
    {
        return view('admin.projectChallengeSolution.create');
    }

    public function store(ProjectChallengeSolutionRequest $request)
    {
        $projectChallengeSolution = ProjectChallengeSolution::create($request->validated());
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $projectChallengeSolution = ProjectChallengeSolution::find($id);
        return responseJson($projectChallengeSolution,'Data exited successfully',200);
    }

    public function update(ProjectChallengeSolutionRequest $request, ProjectChallengeSolution $projectChallengeSolution)
    {
        $projectChallengeSolution->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(ProjectChallengeSolution $projectChallengeSolution)
    {
        $projectChallengeSolution->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
