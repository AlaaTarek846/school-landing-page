<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoAbout extends Model
{
    use HasFactory, TranslationsTrait;

    protected $fillable = [
        'link',
    ];

    protected $table = 'two_about';

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

}