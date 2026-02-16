<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderRequest;
use App\Http\Requests\Admin\ProjectRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Http\Resources\Admin\ProjectResource;
use App\Http\Resources\Admin\ServiceResource;
use App\Models\HomeSlider;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.projects.index');
    }

    public function index(Request $request)
    {
        $projects = Project::with('media','company')->paginate(10);
        return responseJson(ProjectResource::collection($projects->items()),'',200,getPaginates($projects));
    }

    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->validated());
        saveFiles($request->image,$project,"project",'image');
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $projects = Project::with(['media','company'])->find($id);
        return responseJson($projects,'Data exited successfully',200);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        if ($request->hasFile('image')) 
            saveFiles($request->image,$project,"project",'image','update');

        $project->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Project $project)
    {
        deleteFile($project);
        $project->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown( )
    {
        $projects = Project::whereStatus('1')->get();
        return responseJson(ProjectResource::collection($projects),'Data exited successfully',200);
    }
}
