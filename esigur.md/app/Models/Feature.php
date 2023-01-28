<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($feature){
        $feature->name = json_decode($feature->name);
        $feature->body = json_decode($feature->body);

        return $feature;
      });

    }
}
