<?php

namespace App\Model\Inventory\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
