<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($work){
        $work->name = json_decode($work->name);
        $work->title = json_decode($work->title);
        $work->body = json_decode($work->body);
        $work->images = json_decode($work->images);

        return $work;
      });

    }

    public function getRouteKeyName(){
      return 'slug';
    }

    public function type(){
      return $this->belongsTo(Type::class);
    }

    public function testimonial(){
      return $this->belongsTo(Testimonial::class);
    }
}
