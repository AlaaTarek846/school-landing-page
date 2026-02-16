<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Http\Requests\Admin\FaqSectionRequest;
use App\Http\Resources\Admin\FaqResource;
use App\Http\Resources\Admin\FaqSectionResource;
use App\Models\Faq;
use App\Models\FaqSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.faq.index');
    }

    public function index(Request $request)
    {
        $faqs = Faq::paginate(10);
        return responseJson(FaqResource::collection($faqs->items()),'',200,getPaginates($faqs));
    }

    public function store(FaqRequest $request)
    {
        $faq = Faq::create($request->validated());
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $faq = Faq::with(['translations'])->find($id);
        return responseJson($faq,'Data exited successfully',200);
    }

    public function update(FaqRequest $request,Faq $faq)
    {
        $faq->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
