<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'price', 'sale_price',
        'category_id', 'image', 'quantity', 'featured', 'status'];

    protected $casts = ['featured' => 'boolean'];

    public function category()
    {
        return $this->belongsTo(Category::class,
            'category_id', 'id')->withDefault();
    }


    public function tags()
    {
//        return $this->belongsToMany(Tag::class,'product_tag',
//            'product_id','tag_id');

        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
//get{name}Attribute
//$product->image_url
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('assets/front/images/placeholder.jpg');
    }

//$product->image


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Str::title($value);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_product');
    }

}

