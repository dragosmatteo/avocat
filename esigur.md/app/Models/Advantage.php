<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($advantage){
        $advantage->name = json_decode($advantage->name);
        $advantage->body = json_decode($advantage->body);

        return $advantage;
      });

    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
