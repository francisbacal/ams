<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryStock extends Model
{
    protected $fillable = [
        'available',
        'allocated',
        'reserved',
        'for_diagnosis',
        'for_repair',
        'total',
        'category_id',
        'created_at',
        'updated_at',
    ];
}
