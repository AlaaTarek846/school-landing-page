<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function indexPage()
    {
        return view('admin.facilities.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = \App\Models\Facility::with('details')->latest()->paginate(10);
        return responseJson(\App\Http\Resources\Admin\FacilityResource::collection($facilities->items()), '', 200, getPaginates($facilities));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreFacilityRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility = \App\Models\Facility::create($data);

        if (isset($data['details'])) {
            $facility->details()->createMany($data['details']);
        }

        return responseJson([], __('global.AddedSuccessfully'), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $facility = \App\Models\Facility::with('details')->find($id);
        if (!$facility) {
            return responseJson(null, 'Not Found', 404);
        }
        return responseJson(new \App\Http\Resources\Admin\FacilityResource($facility), 'Data retrieved successfully', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateFacilityRequest $request, string $id)
    {
        $facility = \App\Models\Facility::find($id);
        if (!$facility) {
            return responseJson(null, 'Not Found', 404);
        }
        
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($facility->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($facility->image);
            }
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($data);

        // Sync details
        $facility->details()->delete();
        if (isset($data['details'])) {
            $facility->details()->createMany($data['details']);
        }

        return responseJson([], __('global.EditSuccessfully'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facility = \App\Models\Facility::find($id);
        if (!$facility) {
            return responseJson(null, 'Not Found', 404);
        }

        if ($facility->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();
        return responseJson([], __('global.DeletedSuccessfully'), 200);
    }
}
