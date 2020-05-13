<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'serial',
        'description',
        'image',
        'item_status_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
