<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRegistrationRequest;
use App\Http\Resources\Admin\StudentRegistrationResource;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentRegistrationController extends Controller
{
    public function indexPage(Request $request): View
    {
        return view('admin.student_registrations.index');
    }

    public function index(Request $request)
    {
        $query = StudentRegistration::query()->with(['educationalStage', 'classRoom']);

        if ($request->filled('search')) {
            $search = json_decode($request->search, true);

            if (!empty($search['educational_stage_id'])) {
                $query->where('educational_stage_id', $search['educational_stage_id']);
            }

            if (!empty($search['class_id'])) {
                $query->where('class_id', $search['class_id']);
            }

            if (!empty($search['date'])) {
                $query->whereDate('created_at', $search['date']);
            }

            if (!empty($search['search_key'])) {
                $query->where(function ($q) use ($search) {
                    $q->where('student_name', 'like', '%' . $search['search_key'] . '%')
                      ->orWhere('email', 'like', '%' . $search['search_key'] . '%')
                      ->orWhere('phone', 'like', '%' . $search['search_key'] . '%');
                });
            }
        }

        $items = $query->latest()->paginate(10);
        return responseJson(StudentRegistrationResource::collection($items->items()), '', 200, getPaginates($items));
    }

    // Read only - no store/update/destroy from dashboard as per request
    // "لا يوجد تعديل أو حذف من الـ Dashboard"
    // "عرض البيانات فقط (Read Only)"
    
    public function show($id)
    {
        $item = StudentRegistration::with(['educationalStage', 'classRoom'])->find($id);
        if (!$item) {
            return responseJson(null, 'Not Found', 404);
        }
        return responseJson(new StudentRegistrationResource($item), 'Data retrieved successfully', 200);
    }
}
