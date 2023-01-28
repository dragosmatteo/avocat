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
                      <h1>{{config('constant.constant.faq.'.$lang)}}</h1>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div>
  </section>


<!-- section begin -->
<section data-bgcolor="#fff">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!-- Accordion -->
                <div id="accordion-2" class="accordion accordion-style-1">
                  @foreach ($faqs as $key => $faq)
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
<!-- section close -->

@include('home.part.action')
@endsection
