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
                      <h1>{{config('constant.constant.contact.'.$lang)}}</h1>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div>
  </section>


<section aria-label="section">
    <div class="container">
        <div class="row d-flex align-items-center">

            <div class="col-lg-6">
                <div class="padding40 bg-color text-light box-rounded mb30">
                    <h3>{{config('constant.constant.contact.'.$lang)}}</h3>
                    <address class="s1">
                      <span><i class="fa fa-map-marker fa-lg"></i>{{$about->address->$lang}}</span>
                      <span class="text-white"><i class="fa fa-clock-o fa-lg"></i>{!!$about->hour->$lang!!}</span>
                      @if ($about->phone_1)
                        <span><i class="fa fa-phone fa-lg"></i><a href="{{$about->phone_1}}">{{$about->phone_1}}</a></span>
                      @endif
                      @if ($about->phone_2)
                        <span><i class="fa fa-phone fa-lg"></i><a href="{{$about->phone_2}}">{{$about->phone_2}}</a></span>
                      @endif
                      <span><i class="fa fa-envelope-o fa-lg"></i><a href="mailto:{{$about->email}}">{{$about->email}}</a></span>
                    </address>
                </div>
                <div class="padding10 box-rounded" data-bgcolor="#F2F6FE">
                    {!! $about->map !!}
                </div>
            </div>

            <div class="col-lg-6 mb-sm-30 mt-4">
                <h3>{{ config('constant.constant.request.'.$lang) }}</h3>

                <form name="contactForm" class="form-border" method="post" action="{{route('feedback.store')}}">
                    <div class="field-set">
                        <input type="text" name="name" class="form-control" placeholder="{{ config('constant.constant.name.'.$lang) }}" required>
                    </div>

                    <div class="field-set">
                        <input type="text" name="email" class="form-control" placeholder="{{ config('constant.constant.email.'.$lang) }}" />
                    </div>

                    <div class="field-set">
                        <input type="text" name="phone" class="form-control" placeholder="{{ config('constant.constant.phone.'.$lang) }}" required>
                    </div>

                    <div class="field-set">
                        <textarea name="message" class="form-control" rows="3" placeholder="{{ config('constant.constant.message.'.$lang) }}"></textarea>
                    </div>

                    <div class="spacer-half"></div>

                    <div id="submit">
                        <button type="submit" class="btn btn-custom btn-fullwidth color-2">{{ config('constant.constant.send.'.$lang) }}</button>
                    </div>
                    @csrf
                </form>
            </div>

        </div>
    </div>

</section>
@endsection
