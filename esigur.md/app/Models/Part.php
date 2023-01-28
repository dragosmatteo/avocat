<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($part){
        $part->name = json_decode($part->name);
        $part->body = json_decode($part->body);

        return $part;
      });

    }


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
