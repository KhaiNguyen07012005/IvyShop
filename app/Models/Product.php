<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'price', 'sale_price', 'is_new', 'colors'];

 
    protected $casts = [
        'colors' => 'array', 
    ];
}
