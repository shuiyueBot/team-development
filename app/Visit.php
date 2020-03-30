<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visit';
    protected $primaryKey = 'visit_id';
    public $timestamps = false;

    // 黑名单
    protected $guarded = [];
}
