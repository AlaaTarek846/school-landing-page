<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityDetailController extends Controller
{
    public function indexPage()
    {
        return view('admin.facility_details.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = \App\Models\FacilityDetail::with('facility')->latest()->paginate(10);
        return \App\Http\Resources\Admin\FacilityDetailResource::collection($details);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreFacilityDetailRequest $request)
    {
        \App\Models\FacilityDetail::create($request->validated());
        return redirect()->back()->with('success', __('global.AddedSuccessfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = \App\Models\FacilityDetail::findOrFail($id);
        return new \App\Http\Resources\Admin\FacilityDetailResource($detail);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateFacilityDetailRequest $request, string $id)
    {
        $detail = \App\Models\FacilityDetail::findOrFail($id);
        $detail->update($request->validated());
        return redirect()->back()->with('success', __('global.EditSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = \App\Models\FacilityDetail::findOrFail($id);
        $detail->delete();
        return redirect()->back()->with('success', __('global.DeletedSuccessfully'));
    }

    public function getFacilities()
    {
        $facilities = \App\Models\Facility::select('id', 'title_ar', 'title_en')->get();
        return response()->json($facilities);
    }
}
