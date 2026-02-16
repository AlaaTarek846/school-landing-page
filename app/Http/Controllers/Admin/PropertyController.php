<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Http\Requests\Admin\PropertyRequest;
use App\Http\Resources\Admin\ProjectResource;
use App\Http\Resources\Admin\PropertyResource;
use App\Models\File;
use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PropertyController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.properties.index');
    }

    public function index(Request $request)
    {
        $properties = Property::with('media','area','photo')->where('property_type_id',2)->paginate(10);
        return responseJson(PropertyResource::collection($properties->items()),'',200,getPaginates($properties));
    }

    public function store(PropertyRequest $request)
    {
        $data = $request->validated();
        $property = Property::create($request->validated());
        saveFiles($request->photo,$property,"properties",'photo');
        if(isset($request->pdf)) {
            saveFiles($request->pdf, $property, 'properties', "pdf");
        }
        if (isset($data['images'])) {
            if(count($data['images']) > 0) {
                saveFiles($data['images'], $property, 'properties','images');
            }
        }
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $property = Property::with(['photo','pdf','images'])->find($id);
        return responseJson($property,'Data exited successfully',200);
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')){
            saveFiles($request->photo,$property,"properties",'photo','update');
        }
        if($request->hasFile('pdf')) {
            saveFiles($request->pdf, $property, 'properties', "pdf",'update');
        }
        if (isset($data['images'])) {
            if(count($data['images']) > 0) {
                saveFiles($data['images'], $property, 'properties','images');
            }
        }
        $property->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Property $property)
    {
        deleteFile($property);
        $property->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown( )
    {
        $properties = Property::all();
        return responseJson($properties,'Data exited successfully',200);
    }

    public function deleteMedia ($id) {
        File::find($id)->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
