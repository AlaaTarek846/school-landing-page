<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AreaRequest;
use App\Http\Resources\Admin\AreaResource;
use App\Models\Area;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.areas.index');
    }

    public function index(Request $request)
    {
        $areas = Area::with('media')->paginate(10);
        return responseJson(AreaResource::collection($areas->items()), '', 200, getPaginates($areas));
    }

    public function store(AreaRequest $request)
    {
        $data = Area::create($request->validated());
        return responseJson([], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $data = Area::find($id);
        return responseJson($data, 'Data exited successfully', 200);
    }

    public function update(AreaRequest $request, Area $area)
    {

        $area->update($request->validated());
        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy(Area $area)
    {
        $area->delete();
        return responseJson([], 'Deleted Successfully', 200);
    }


    public function getAreas()
    {
        return responseJson(AreaResource::collection(Area::latest()->get()));
    }

}
