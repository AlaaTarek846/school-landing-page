<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\Admin\CompanyRequest;
use App\Http\Resources\Admin\ArticleCategoryResource;
use App\Http\Resources\Admin\ArticleQuiriesResource;
use App\Http\Resources\Admin\ArticleResource;
use App\Http\Resources\Admin\CompanyResource;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleClientQuiry;
use App\Models\Company;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function indexPage(Request $request): View
    {
        return view('admin.companies.index');
    }

    public function index(Request $request)
    {
        $companies = Company::with('media')->paginate(10);
        return responseJson(CompanyResource::collection($companies->items()), '', 200, getPaginates($companies));
    }

    public function store(CompanyRequest $request)
    {
        $data = Company::create($request->validated());
        saveFiles($request->image, $data, "companies",'image');
        return responseJson([], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $data = Company::with(['media'])->find($id);
        return responseJson($data, 'Data exited successfully', 200);
    }

    public function update(CompanyRequest $request, Company $company)
    {

        if ($request->hasFile('image'))
            saveFiles($request->image,$company,"companies",'image','update');

        $company->update($request->validated());
        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy(Company $company)
    {
        deleteFile($company);
        $company->delete();
        return responseJson([], 'Deleted Successfully', 200);
    }


    public function getCompanies()
    {
        return responseJson(CompanyResource::collection(Company::latest()->get()));
    }

}
