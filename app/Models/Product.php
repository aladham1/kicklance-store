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

    public function tags()
    {
//        return $this->belongsToMany(Tag::class,'product_tag',
//            'product_id','tag_id');

        return $this->belongsToMany(Tag::class);
    }
}


// one to one
// one to many
// many to many
