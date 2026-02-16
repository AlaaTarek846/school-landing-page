<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWhyChooseUsRequest;
use App\Http\Requests\UpdateWhyChooseUsRequest;
use App\Http\Resources\Admin\WhyChooseUsResource;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class WhyChooseUsController extends Controller
{
    public function indexPage(Request $request): View
    {
        return view('admin.why_choose_us.index');
    }

    public function index(Request $request)
    {
        $items = WhyChooseUs::latest()->paginate(10);
        return responseJson(WhyChooseUsResource::collection($items->items()), '', 200, getPaginates($items));
    }

    public function store(StoreWhyChooseUsRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('why_choose_us', 'public');
        }

        WhyChooseUs::create($data);
        return responseJson([], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $item = WhyChooseUs::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        return responseJson(new WhyChooseUsResource($item), 'Data retrieved successfully', 200);
    }

    public function update(UpdateWhyChooseUsRequest $request, $id)
    {
        $item = WhyChooseUs::find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }

        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('why_choose_us', 'public');
        }

        $item->update($data);
        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy($id)
    {
        $item = WhyChooseUs::find($id);
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
