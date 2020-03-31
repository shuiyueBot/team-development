<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $table = 'salesman';
    protected $primaryKey = 'sale_id';
    public $timestamps = false;

    // 黑名单
    protected $guarded = [];


}
