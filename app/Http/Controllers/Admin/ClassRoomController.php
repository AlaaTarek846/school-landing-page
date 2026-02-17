<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Http\Resources\Admin\ClassRoomResource;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassRoomController extends Controller
{
    public function indexPage(Request $request): View
    {
        return view('admin.classes.index');
    }

    public function index(Request $request)
    {
        $items = ClassRoom::with('educationalStage')->latest()->paginate(10);
        return responseJson(ClassRoomResource::collection($items->items()), '', 200, getPaginates($items));
    }

    public function store(StoreClassRoomRequest $request)
    {
        ClassRoom::create($request->validated());
        return responseJson([], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $item = ClassRoom::with('educationalStage')->find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        return responseJson(new ClassRoomResource($item), 'Data retrieved successfully', 200);
    }

    public function update(UpdateClassRoomRequest $request, $id)
    {
        $item = ClassRoom::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        $item->update($request->validated());
        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy($id)
    {
        $item = ClassRoom::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        if ($item->studentRegistrations()->count() > 0) {
            return responseJson(null, __('website.Cannot delete this class because it has related student registrations'), 422);
        }

        $item->delete();
        return responseJson([], 'Deleted Successfully', 200);
    }
}
