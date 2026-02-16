<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'image',
    ];

    public function details()
    {
        return $this->hasMany(FacilityDetail::class);
    }
}
