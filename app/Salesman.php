<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $table = 'salesman';
<<<<<<< HEAD
    protected $primaryKey = 'salesman_id';
    public $timestamps = false;
=======
    protected $primaryKey = 'sale_id';
    public $timestamps = false;

    // 黑名单
    protected $guarded = [];
>>>>>>> ccc047a4caffc99f32d7ab366d3077cb475ffe4f
}
