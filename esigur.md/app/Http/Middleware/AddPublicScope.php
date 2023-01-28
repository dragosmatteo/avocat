<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Type;
use App\Models\Work;
use App\Models\Faq;
use App\Models\Step;
use App\Models\Advantage;
use App\Models\Price;
use App\Models\Part;
use App\Models\Service;
use App\Models\Feature;
use App\Models\Team;
use App\Models\About;

class AddPublicScope
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      Testimonial::addGlobalScope('testimonials', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Blog::addGlobalScope('blogs', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Partner::addGlobalScope('partners', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Work::addGlobalScope('works', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Faq::addGlobalScope('faqs', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Step::addGlobalScope('steps', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Advantage::addGlobalScope('advantages', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Price::addGlobalScope('prices', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Part::addGlobalScope('parts', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Service::addGlobalScope('services', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      Feature::addGlobalScope('features', function($builder) {
          $builder->where('show', 0)->orderBy('order','asc');
      });

      About::addGlobalScope('abouts', function($builder) {
          $builder->where('show', 0);
      });

      return $next($request);
    }
}
