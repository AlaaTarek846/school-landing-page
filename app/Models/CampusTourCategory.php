<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusTourCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
    ];

    public function campusTours()
    {
        return $this->hasMany(CampusTour::class);
    }
}
