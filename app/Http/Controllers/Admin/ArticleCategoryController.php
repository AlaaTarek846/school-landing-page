<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleCategoryRequest;
use App\Http\Resources\Admin\ArticleCategoryResource;
use App\Models\ArticleCategory;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.articleCategory.index');
    }

    public function index(Request $request)
    {
        $data = ArticleCategory::latest()->paginate(10);
        return responseJson(ArticleCategoryResource::collection($data->items()),'',200,getPaginates($data));
    }

    public function store(ArticleCategoryRequest $request)
    {
        ArticleCategory::create($request->validated());
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $articleCategory = ArticleCategory::find($id);
        return responseJson($articleCategory,'Data exited successfully',200);
    }

    public function update(ArticleCategoryRequest $request, ArticleCategory $articleCategory)
    {
        $articleCategory->update($request->validated());
        return responseJson([],'Updated Successfully',200);
    }

    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
