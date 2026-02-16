<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRegistrationRequest;
use App\Models\StudentRegistration;
use App\Models\EducationalStage;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function store(StoreStudentRegistrationRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('registrations/pdfs', 'public');
        }

        StudentRegistration::create($data);

        return responseJson([], 'Registration Submitted Successfully', 200);
    }
    
    // Optional: Methods to fetch stages/classes for dropdowns if needed via AJAX
    public function getStages() {
        $stages = EducationalStage::with('classes')->get();
         return responseJson($stages, '', 200);
    }
}
