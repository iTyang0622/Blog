<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cates extends Model
{
	use SoftDeletes;
	
    //设置表名
    protected $table = 'cates';
}
