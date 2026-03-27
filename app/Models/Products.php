<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'availability',
    ];
}
