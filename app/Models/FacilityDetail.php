<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityDetail extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'count',
        'facility_id',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function getTitleAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

}
