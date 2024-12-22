<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [

        'cate_id',
        'name',
        'slug',
        'price',
        'discount',
        'short_desc',
        'long_desc',
        'thumbnail',
        'multiple_image',
        'new_product',
        'feature_product',
        'status'

    ];
    public function cate()
    {
        return $this->belongsTo(category::class, 'cate_id');
    }
}