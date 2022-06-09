<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'price', 'sale_price',
        'category_id', 'image', 'quantity'];

    public function category()
    {
        return $this->belongsTo(Category::class,
            'category_id','id')->withDefault();
    }
}


// one to one
// one to many
// many to many
