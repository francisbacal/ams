<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',

    ];

    /*================================
    | ELOQUENT - RELATIONSHIP
    |-------------------------------*/

    public function childs()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }
}
