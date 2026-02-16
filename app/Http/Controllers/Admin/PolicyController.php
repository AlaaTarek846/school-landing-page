<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Http\Requests\Admin\FaqSectionRequest;
use App\Http\Requests\Admin\PolicyRequest;
use App\Http\Resources\Admin\FaqResource;
use App\Http\Resources\Admin\FaqSectionResource;
use App\Http\Resources\Admin\PolicyResource;
use App\Models\Faq;
use App\Models\FaqSection;
use App\Models\Policy;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PolicyController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.policy.index');
    }

    public function index(Request $request)
    {
        $policies = Policy::paginate(10);
        return responseJson(PolicyResource::collection($policies->items()),'',200,getPaginates($policies));
    }

    public function store(PolicyRequest $request)
    {
        $policy = Policy::create($request->validated());
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $policy = Policy::find($id);
        return responseJson($policy,'Data exited successfully',200);
    }

    public function update(PolicyRequest $request,Policy $policy)
    {
        $policy->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Policy $policy)
    {
        $policy->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
