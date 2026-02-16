<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory,TranslationsTrait;

    protected $fillable = ['name_ar', 'name_en', 'job_ar', 'job_en', 'description_ar', 'description_en', 'status'];

    protected $table = 'Testimonials';

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

    public function getNameAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function getJobAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->job_ar : $this->job_en;
    }

    public function getDescriptionAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }


}
