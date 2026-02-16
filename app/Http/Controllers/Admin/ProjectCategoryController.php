<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryRequest;
use App\Http\Resources\Admin\ProjectCategoryResource;
use App\Models\ProjectCategory;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.projectCategory.index');
    }

    public function index(Request $request)
    {
        $data = ProjectCategory::latest()->paginate(10);
        return responseJson(ProjectCategoryResource::collection($data->items()),'',200,getPaginates($data));
    }

    public function store(ProjectCategoryRequest $request)
    {
        ProjectCategory::create($request->validated());
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $projectCategory = ProjectCategory::find($id);
        return responseJson($projectCategory,'Data exited successfully',200);
    }

    public function update(ProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $projectCategory->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown( )
    {
        $projectCategory = ProjectCategory::all();
        return responseJson($projectCategory,'Data exited successfully',200);
    }
}
