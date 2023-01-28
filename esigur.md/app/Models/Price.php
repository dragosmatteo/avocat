<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($price){
        $price->name = json_decode($price->name);

        return $price;
      });

    }
    
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
