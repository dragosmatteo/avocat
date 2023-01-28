@extends('app.master')

@section('meta')
<title>{{$about->name->$lang}}</title>
<meta name="description" content="{{$about->title->$lang}}"/>

<meta property="og:type" content="website" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:title" content="{{$about->name->$lang}}" />
<meta property="og:description" content="{{$about->title->$lang}}" />
@endsection

@section('content')
  <section>
      <div class="container pt-lg-5 mt-lg-5 mt-2 pt-2">
          <div class="row align-items-center text-center">
              <div class="col-lg-6 offset-lg-3">
                <div class="p-lg-5 p-3 border rounded shadow">
                  <h2>{{config('constant.constant.request_title.'.$lang)}}</h2>
                  <p>{{config('constant.constant.request_body.'.$lang)}}</p>
                </div>
              </div>
          </div>
      </div>
  </section>
@endsection
