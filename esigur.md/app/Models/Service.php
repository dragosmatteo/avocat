<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::retrieved(function($service){
        $service->name = json_decode($service->name);
        $service->subname = json_decode($service->subname);
        $service->name_seo = json_decode($service->name_seo);
        $service->title = json_decode($service->title);
        $service->body = json_decode($service->body);
        $service->advantage_title = json_decode($service->advantage_title);
        $service->faq_title = json_decode($service->faq_title);
        $service->step_title = json_decode($service->step_title);

        return $service;
      });

    }

    public function getRouteKeyName(){
      return 'slug';
    }

    public function service(){
      return $this->belongsTo(Service::class);
    }

    public function services(){
      return $this->hasMany(Service::class);
    }

    public function works()
    {
        return $this->belongsToMany(Work::class);
    }

    public function faqs()
    {
        return $this->belongsToMany(Faq::class);
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class);
    }

    public function parts()
    {
        return $this->belongsToMany(Part::class);
    }

    public function advantages()
    {
        return $this->belongsToMany(Advantage::class);
    }

    public function prices()
    {
        return $this->belongsToMany(Price::class);
    }
}
