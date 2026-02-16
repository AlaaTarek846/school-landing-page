<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'educational_stage_id',
        'class_id',
        'birth_date',
        'phone',
        'email',
        'notes',
        'pdf',
    ];

    public function educationalStage()
    {
        return $this->belongsTo(EducationalStage::class, 'educational_stage_id');
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}
