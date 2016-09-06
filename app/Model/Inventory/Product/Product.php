<?php

namespace App\Model\Inventory\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo('App\Model\Inventory\Setting\Category')->withTrashed();
    }

    public function subcategory()
    {
    	# code...
    	return $this->belongsTo('App\Model\Inventory\Setting\Subcategory')->withTrashed();
    }

    public function unit()
    {
    	# code...
    	return $this->belongsTo('App\Model\Inventory\Setting\Unit')->withTrashed();
    }
}
