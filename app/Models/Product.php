<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'detail',
        'category_id',     
        'subcategory_id',  
        'country',
        'state',
        'city',
        'area',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}