<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = ['code', 'requested_date', 'notes', 'requisition_status_id', 'user_id'];

    public function assets()
    {
        return $this->belongsToMany('App\Asset', 'asset_requisition')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\RequisitionStatus');
    }
}
