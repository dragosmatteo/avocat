<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($about){
        $about->tagline = json_decode($about->tagline);
        $about->name = json_decode($about->name);
        $about->title = json_decode($about->title);
        $about->body = json_decode($about->body);
        $about->hour = json_decode($about->hour);
        $about->address = json_decode($about->address);
        $about->images = json_decode($about->images);

        return $about;
      });

    }
}
