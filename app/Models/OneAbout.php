<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneAbout extends Model
{
    use HasFactory, TranslationsTrait;

    protected $guarded = [ ];

    protected $table = 'one_about';

    public function media()
    {
        return $this->morphMany(File::class, 'uploadable');
    }

    public function details(){
        return $this->hasMany(AboutDetail::class, 'one_about_id','id');
    }

    public function firstPhoto()
    {
        return $this->morphOne(File::class, 'uploadable')->where('identifier', 'first_photo');
    }

    public function getTitleAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getDescriptionAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getTitleColorAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->title_color_ar : $this->title_color_en;
    }

}