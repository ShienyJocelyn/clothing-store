<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clothes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category',
        'image_id',
        'product_name',
        'price',
        'description', 
        'seller_contact',
        'published_at'
    ];

    protected static function boot() 
    {
        parent::boot();

        static::forceDeleting(function(Clothes $clothes) {
            $clothes->image?->delete();
        });
    }

}
