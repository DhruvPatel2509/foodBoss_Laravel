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
        'discount_percent',
        'price',
        'image',
        'availability',
    ];
    public function getFinalPriceAttribute()
    {
        if ($this->discount_percent > 0) {
            $discountAmount = ($this->price * $this->discount_percent) / 100;
            return $this->price - $discountAmount;
        }
        return $this->price;
    }

    public function category()
    {

        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
