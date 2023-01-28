<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($type){
        $type->name = json_decode($type->name);
        $type->title = json_decode($type->title);
        $type->body = json_decode($type->body);

        return $type;
      });

    }

    public function getRouteKeyName(){
      return 'slug';
    }

    public function works(){
      return $this->hasMany(Work::class);
    }
    public function blogs(){
      return $this->hasMany(Blog::class);
    }
}
