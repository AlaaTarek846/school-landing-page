<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationalStageRequest;
use App\Http\Requests\UpdateEducationalStageRequest;
use App\Http\Resources\Admin\EducationalStageResource;
use App\Models\EducationalStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EducationalStageController extends Controller
{
    public function indexPage(Request $request): View
    {
        return view('admin.educational_stages.index');
    }

    public function index(Request $request)
    {
        $items = EducationalStage::latest()->paginate(10);
        return responseJson(EducationalStageResource::collection($items->items()), '', 200, getPaginates($items));
    }

    public function store(StoreEducationalStageRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('educational_stages', 'public');
        }

        EducationalStage::create($data);
        return responseJson([], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $item = EducationalStage::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        return responseJson(new EducationalStageResource($item), 'Data retrieved successfully', 200);
    }

    public function update(UpdateEducationalStageRequest $request, $id)
    {
        $item = EducationalStage::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }

        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('educational_stages', 'public');
        }

        $item->update($data);
        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy($id)
    {
        $item = EducationalStage::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return responseJson([], 'Deleted Successfully', 200);
    }
}
