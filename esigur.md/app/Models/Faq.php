<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($faq){
        $faq->name = json_decode($faq->name);
        $faq->body = json_decode($faq->body);

        return $faq;
      });

    }


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
