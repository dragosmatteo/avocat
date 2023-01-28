<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($testimonial){
        $testimonial->name = json_decode($testimonial->name);
        $testimonial->body = json_decode($testimonial->body);

        return $testimonial;
      });

    }
}
