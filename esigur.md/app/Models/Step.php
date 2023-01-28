<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($step){
        $step->name = json_decode($step->name);
        $step->body = json_decode($step->body);

        return $step;
      });

    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
