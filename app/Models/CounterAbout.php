<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CounterAbout extends Model
{
    use HasFactory,TranslationsTrait;

    protected $fillable = [
        'count',
        'icon',
    ];

    protected $table = 'counter_about';

}