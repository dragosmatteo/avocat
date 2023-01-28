@extends('app.master')

@section('meta')

@if (isset($service->name_seo->$lang))
<title>{{ $service->name_seo->$lang }}</title>
@else
<title>{{ $service->name->$lang }}. {{ $about->name->$lang }}</title>
@endif

<meta name="description" content="{{ $service->title->$lang }}" />

<meta property="og:type" content="website" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:title" content="{{ (isset($service->name_seo->$lang))? $service->name_seo->$lang : $service->name->$lang.'. '.$about->name->$lang }}" />
<meta property="og:description" content="{{ $service->title->$lang }}" />

@endsection


@section('content')
<section id="subheader" data-bgcolor="#f5f7f0">
  <div class="center-y relative text-center">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="spacer-single"></div>
          <h1>{{$service->name->$lang}}</h1>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</section>

<section class="pt40 pb40 bg-color-secondary">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8 mb-sm-30">
        <h3 class="no-bottom">{{$service->subname->$lang}}</h3>
      </div>
      <div class="col-md-4 text-right">
        <a href="#calltoaction" class="btn-custom">{{ config('constant.constant.request.'.$lang) }}</a>
      </div>
    </div>
  </div>
</section>

<section class="pb-0" data-bgcolor="#fff">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <picture>
            <source srcset="/files/services/lg/{{$service->image.'.webp'}}" type="image/webp" media="(min-width: 1025px)">
            <source srcset="/files/services/lg/{{$service->image.'.jpg'}}" type="image/jpeg" media="(min-width: 1025px)">
            <source srcset="/files/services/md/{{$service->image.'.webp'}}" type="image/webp" media="(min-width: 415px)">
            <source srcset="/files/services/md/{{$service->image.'.jpg'}}" type="image/jpeg" media="(min-width: 415px)">
            <source srcset="/files/services/sm/{{$service->image.'.webp'}}" type="image/webp">
            <source srcset="/files/services/sm/{{$service->image.'.jpg'}}" type="image/jpeg">
            <img class="w-100 appear-animate rounded" src="/files/services/lg/{{$service->image.'.jpg'}}" alt="{{$service->subname->$lang}}"  data-animation-options="{'name': 'fadeInUpShorter', 'delay': '.5s'}">
        </picture>
      </div>
      <div class="col-md-8" data-animation="fadeInRight" data-delay="200">
        <h2>
          {{$service->subname->$lang}}
        </h2>
        <div class="small-border sm-left"></div>
        {!! $service->body->$lang !!}
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</section>

@if ($service->steps->count())
<section data-bgcolor="#fff">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center mb-4">
          <h2>{{(isset($service->step_title->$lang))? $service->step_title->$lang : ''}}</h2>
          <div class="small-border"></div>
        </div>
      </div>
      @foreach ($service->steps as $key => $step)
      <div class="col-lg-4 col-md-6 mb30">
        <div class="f-box f-border f-icon-left f-icon-rounded">
          <i class="icofont-checked bg-color text-light"></i>
          <div class="fb-text">
            <h4>{{$step->name->$lang}}</h4>
            <p>{{$step->body->$lang}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@include('home.part.action',['service' => $service->name->$lang])

@if ($service->advantages->count())
<section data-bgcolor="#fff">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="text-center mb-4">
          <h2>{{(isset($service->advantage_title->$lang))? $service->advantage_title->$lang : ''}}</h2>
          <div class="small-border"></div>
        </div>
      </div>

      @foreach ($service->advantages as $key => $adv)
      <div class="col-lg-4 col-md-6 mb30">
        <div class="f-box f-border f-icon-left f-icon-rounded">
          <i class="icofont-checked bg-color text-light"></i>
          <div class="fb-text">
            <h4>{{$adv->name->$lang}}</h4>
            <p>{{$adv->body->$lang}}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>
@endif

@if ($service->faqs->count())
<section class="no-top" data-bgcolor="#ffffff">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center mb-4">
          <h2>{{(isset($service->faq_title->$lang))? $service->faq_title->$lang : ''}}</h2>
          <div class="small-border"></div>
        </div>
      </div>

      <div class="col-md-12">
        <!-- Accordion -->
        <div id="accordion-2" class="accordion accordion-style-1">
          @foreach ($service->faqs as $key => $faq)
          <!-- Accordion item 1 -->
          <div class="card">
            <div id="heading-{{$key}}" class="card-header bg-white shadow-sm border-0">
              <h6 class="mb-0 font-weight-bold">
                <a href="#" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}" class="d-block position-relative text-dark collapsible-link py-2">
                  {{ $faq->name->$lang }}
                </a>
              </h6>
            </div>
            <div id="collapse-{{$key}}" aria-labelledby="heading-{{$key}}" data-parent="#accordion-2" class="collapse">
              <div class="card-body p-4">
                {!! $faq->body->$lang !!}
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endif

@endsection
