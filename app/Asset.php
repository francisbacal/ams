<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Asset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'price',
        'serial',
        'description',
        'image',
        'category_id',
        'asset_status_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }
    public function status()
    {
        return $this->belongsTo('App\AssetStatus', 'asset_status_id');

    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
