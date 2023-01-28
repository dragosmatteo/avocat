@if ($features->count())
<section>
  <div class="container">
    <div class="row">

      <div class="col-md-6 offset-sm-3">
        <div class="text-center">
          <h2>{{config('constant.constant.feature_title.'.$lang)}}</h2>
          <div class="small-border"></div>
        </div>
      </div>

      @foreach ($features as $key => $feature)
      <div class="col-lg-4 col-md-6 mb30">
        <div class="f-box f-border f-icon-left f-icon-circle">
          <i class="icofont-check bg-color text-light"></i>
          <div class="fb-text">
            <h4>{{$feature->name->$lang}}</h4>
            <p style="font-size: 1rem; line-height: 1.2rem">{{$feature->body->$lang}}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>
@endif
