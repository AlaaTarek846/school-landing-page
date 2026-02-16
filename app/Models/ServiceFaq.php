<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceFaq extends Model
{
     use HasFactory;

    protected $fillable = [
        'status',
        'title_en',
        'title_ar', 
        'description_en',
        'description_ar',
        'service_id',
        'sort'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
