<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampusTourRequest;
use App\Http\Requests\UpdateCampusTourRequest;
use App\Http\Resources\Admin\CampusTourResource;
use App\Models\CampusTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CampusTourController extends Controller
{
    public function indexPage(Request $request): View
    {
        return view('admin.campus_tours.index');
    }

    public function index(Request $request)
    {
        $items = CampusTour::with('category')->latest()->paginate(10);
        return responseJson(CampusTourResource::collection($items->items()), '', 200, getPaginates($items));
    }

    public function store(StoreCampusTourRequest $request)
    {
        $data = $request->validated();
        
        // Handle Image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('campus_tours/images', 'public');
        }

        // Handle Video (if strictly uploaded vs link?) Request validation allows video as 'string' (link) or upload?
        // User request: "video (nullable)"
        // If it's a file upload for video:
         if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('campus_tours/videos', 'public');
        }

        CampusTour::create($data);
        return responseJson([], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $item = CampusTour::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        return responseJson(new CampusTourResource($item), 'Data retrieved successfully', 200);
    }

    public function update(UpdateCampusTourRequest $request, $id)
    {
        $item = CampusTour::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }

        $data = $request->validated();

        if ($request->type === 'image') {
            if ($item->video) {
                Storage::disk('public')->delete($item->video);
                $data['video'] = null;
            }
            $data['link'] = null;

            if ($request->hasFile('image')) {
                if ($item->image) {
                    Storage::disk('public')->delete($item->image);
                }
                $data['image'] = $request->file('image')->store('campus_tours/images', 'public');
            }
        } elseif ($request->type === 'video') {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
                $data['image'] = null;
            }
            $data['link'] = null;

            if ($request->hasFile('video')) {
                if ($item->video) {
                    Storage::disk('public')->delete($item->video);
                }
                $data['video'] = $request->file('video')->store('campus_tours/videos', 'public');
            }
        } elseif ($request->type === 'link') {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
                $data['image'] = null;
            }
            if ($item->video) {
                Storage::disk('public')->delete($item->video);
                $data['video'] = null;
            }
            // Link is already in $data from validated()
        }

        $item->update($data);
        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy($id)
    {
        $item = CampusTour::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        if ($item->video) {
             Storage::disk('public')->delete($item->video);
        }

        $item->delete();
        return responseJson([], 'Deleted Successfully', 200);
    }
}
