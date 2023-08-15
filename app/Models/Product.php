<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = ['name', 'image', 'price', 'content'];
    protected $guarded = [];


    // function getImageAttribute($value) {
    //     $img = asset('images/no-image.jpg');
    //     if (file_exists(public_path('images/'.$value))) {
    //         $img = asset('images/'.$value);
    //     }
    //     return $img;
    // }

    // function getPathAttribute() {
    //     $img = asset('images/no-image.jpg');
    //     if (file_exists(public_path('images/'.$this->image))) {
    //         $img = asset('images/'.$this->image);
    //     }
    //     return $img;

    // }

    protected function path(): Attribute
    {
        return Attribute::make(
            get: function() {
                $img = asset('images/no-image.jpg');
                if (file_exists(public_path('images/'.$this->image))) {
                    $img = asset('images/'.$this->image);
                }
                return $img;
            }
        );
    }


    // protected static function booted(): void
    // {
    //     static::created(function (Product $product) {
    //         dd($product->name . ' Created Successfully');
    //     });
    // }

}
