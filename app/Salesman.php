<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $table = 'salesman';
    protected $primaryKey = 'salesman_id';
    public $timestamps = false;
}
