<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($blog){
        $blog->name = json_decode($blog->name);
        $blog->seo_name = json_decode($blog->seo_name);
        $blog->title = json_decode($blog->title);
        $blog->body = json_decode($blog->body);

        return $blog;
      });

    }

    public function getRouteKeyName(){
      return 'slug';
    }
}
