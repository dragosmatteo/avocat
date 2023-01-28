@extends('app.master')

@section('meta')
<title>{{$about->name->$lang}}</title>
<meta name="description" content="{{$about->title->$lang}}"/>

<meta property="og:type"   content="website" />
<meta property="og:url"    content="{{url()->current()}}" />
<meta property="og:title"  content="{{$about->name->$lang}}" />
<meta property="og:description"  content="{{$about->title->$lang}}" />
@endsection

@section('content')
  <section id="subheader" data-bgcolor="#f5f7f0">
      <div class="center-y relative text-center">
          <div class="container">
              <div class="row">
                  <div class="col text-center">
                      <div class="spacer-single"></div>
                      <h1>{{config('constant.constant.about.'.$lang)}}</h1>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div>
  </section>

<section aria-label="section" data-bgcolor="#ffffff">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <picture>
                    <source srcset="/files/abouts/lg/{{$about->image.'.webp'}}" type="image/webp" media="(min-width: 1025px)">
                    <source srcset="/files/abouts/lg/{{$about->image.'.jpg'}}" type="image/jpeg" media="(min-width: 1025px)">
                    <source srcset="/files/abouts/md/{{$about->image.'.webp'}}" type="image/webp" media="(min-width: 415px)">
                    <source srcset="/files/abouts/md/{{$about->image.'.jpg'}}" type="image/jpeg" media="(min-width: 415px)">
                    <source srcset="/files/abouts/sm/{{$about->image.'.webp'}}" type="image/webp">
                    <source srcset="/files/abouts/sm/{{$about->image.'.jpg'}}" type="image/jpeg">
                    <img class="mb-4 d-block w-100 appear-animate rounded" src="/files/abouts/lg/{{$about->image.'.jpg'}}" alt="{{$about->name->$lang}}"  data-animation-options="{'name': 'fadeInUpShorter', 'delay': '.5s'}">
                </picture>

                <span class="p-title invert">{{$about->company}}</span><br>
                <h2>{{$about->tagline->$lang}}</h2>

                {!! $about->body->$lang !!}
            </div>
        </div>
    </div>
</section>

@include('home.part.feature')

@include('home.part.action')

@endsection
