<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampusTourCategoryRequest;
use App\Http\Requests\UpdateCampusTourCategoryRequest;
use App\Http\Resources\Admin\CampusTourCategoryResource;
use App\Models\CampusTourCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CampusTourCategoryController extends Controller
{
    public function indexPage(Request $request): View
    {
        return view('admin.campus_tour_categories.index');
    }

    public function index(Request $request)
    {
        $items = CampusTourCategory::latest()->paginate(10);
        return responseJson(CampusTourCategoryResource::collection($items->items()), '', 200, getPaginates($items));
    }

    public function store(StoreCampusTourCategoryRequest $request)
    {
        $data = $request->validated();
        CampusTourCategory::create($data);
        return responseJson([], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $item = CampusTourCategory::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        return responseJson(new CampusTourCategoryResource($item), 'Data retrieved successfully', 200);
    }

    public function update(UpdateCampusTourCategoryRequest $request, $id)
    {
        $item = CampusTourCategory::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }

        $data = $request->validated();
        $item->update($data);
        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy($id)
    {
        $item = CampusTourCategory::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }

        $item->delete();
        return responseJson([], 'Deleted Successfully', 200);
    }
}
