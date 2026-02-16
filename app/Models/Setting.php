<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Setting extends Model
{
    use HasFactory, TranslationsTrait;

    protected $guarded = ['id'];

    public function getAddressAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->address_ar : $this->address_en;
    }

}
