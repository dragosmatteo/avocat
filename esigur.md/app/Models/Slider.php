<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($slider){
        $slider->title = json_decode($slider->title);

        return $slider;
      });

    }
}
