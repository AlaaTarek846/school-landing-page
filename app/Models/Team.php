<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory, TranslationsTrait;

    protected $fillable = ['name_ar', 'name_en', 'job_ar', 'job_en', 'status'];

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }


}