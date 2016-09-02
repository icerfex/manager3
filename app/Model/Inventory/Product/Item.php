<?php

namespace App\Model\Inventory\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo('App\Model\Inventory\Product\Category')->withTrashed();
    }

    public function subcategory()
    {
    	# code...
    	return $this->belongsTo('App\Model\Inventory\Product\Subcategory')->withTrashed();
    }

    public function unit()
    {
    	# code...
    	return $this->belongsTo('App\Model\Inventory\Product\Unit')->withTrashed();
    }
}
