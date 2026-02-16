<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FaqSection extends Model
{
    use HasFactory,TranslationsTrait;

    protected $fillable = [
        'number_section'
    ];

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

}