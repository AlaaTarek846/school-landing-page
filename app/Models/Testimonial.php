<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory,TranslationsTrait;

    protected $guarded = [];

    protected $table = 'Testimonials';

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }



}
