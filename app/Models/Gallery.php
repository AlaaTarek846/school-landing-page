<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
     use HasFactory;

    protected $guarded = ['id'];


    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

}
