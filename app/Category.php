<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

/*================================
| ELOQUENT - RELATIONSHIP
|-------------------------------*/

    public function categoryStocks()
    {

        return $this->belongsTo('App\CategoryStock');

    }
}
