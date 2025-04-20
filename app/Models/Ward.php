<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = ['id', 'name', 'city_id'];
    public $timestamps = true;
}