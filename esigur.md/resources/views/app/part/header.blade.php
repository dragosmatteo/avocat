<div id="topbar" class="text-light">
    <div class="container-fluid">
        <div class="topbar-left">
            <span class="topbar-widget"><a title="{{ config('constant.constant.contact.'.$lang) }}" href="{{route('contact.index')}}" class="contact d-lg-show">{{ config('constant.constant.contact.'.$lang) }}</a></span>
            <span class="topbar-widget sm-hide"><a title="{{ config('constant.constant.faq.'.$lang) }}" href="{{route('faq.index')}}" class="contact d-lg-show">{{ config('constant.constant.faq.'.$lang) }}</a></span>
            <span class="topbar-widget sm-hide"><a title="{{ config('constant.constant.about.'.$lang) }}" href="{{route('about.index')}}" class="contact d-lg-show">{{ config('constant.constant.about.'.$lang) }}</a></span>
            <span class="topbar-widget sm-hide"><a title="{{ config('constant.constant.blog.'.$lang) }}" href="{{route('blog.index')}}" class="contact d-lg-show">{{ config('constant.constant.blog.'.$lang) }}</a></span>
        </div>
        <div class="topbar-right">
          @foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
            <span class="topbar-widget">
              <a class="text-uppercase" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                  {{ $localeCode }}
              </a>
            </span>
          @endforeach
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<header class="transparent header-light scroll-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        <div id="logo">
                            <a title="{{ $about->company }} - {{ $about->name->$lang }}" href="{{route('home')}}">
                                <picture>
                                    <source srcset="/files/abouts/lg/{{$about->logo.'.webp'}}" type="image/webp" media="(min-width: 1025px)">
                                    <source srcset="/files/abouts/lg/{{$about->logo.'.jpg'}}" type="image/jpeg" media="(min-width: 1025px)">
                                    <source srcset="/files/abouts/md/{{$about->logo.'.webp'}}" type="image/webp">
                                    <source srcset="/files/abouts/md/{{$about->logo.'.jpg'}}" type="image/jpeg">
                                    <img class="logo-2" loading="lazy" src="/files/abouts/lg/{{$about->logo.'.jpg'}}" data-src="/files/abouts/lg/{{$about->logo.'.jpg'}}" alt="{{ $about->company }} - {{ $about->name->$lang }}">
                                </picture>
                            </a>
                        </div>
                        <!-- logo close -->
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <!-- mainmenu begin -->
                        <ul id="mainmenu">
                          @foreach ($app_services_all as $key => $serv)
                            <li>
                              <a title="{{ $serv->name->$lang }}" href="{{ route('service.show',$serv) }}">{{ $serv->name->$lang }}</a>
                            </li>
                          @endforeach
                          <li class="d-md-none"><a title="{{ config('constant.constant.blog.'.$lang) }}" href="{{route('blog.index')}}" class="contact d-lg-show">{{ config('constant.constant.blog.'.$lang) }}</a></li>
                          <li class="d-md-none"><a title="{{ config('constant.constant.faq.'.$lang) }}" href="{{route('faq.index')}}" class="contact d-lg-show">{{ config('constant.constant.faq.'.$lang) }}</a></li>
                          <li class="d-md-none"><a title="{{ config('constant.constant.about.'.$lang) }}" href="{{route('about.index')}}" class="contact d-lg-show">{{ config('constant.constant.about.'.$lang) }}</a></li>
                          <li class="d-md-none"><a title="{{ config('constant.constant.contact.'.$lang) }}" href="{{route('contact.index')}}" class="contact d-lg-show">{{ config('constant.constant.contact.'.$lang) }}</a></li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                      <div class="h-phone-block">
                        <div class="h-phone">
                          <span>{{ config('constant.constant.contact_number.'.$lang) }}</span><i class="fa fa-phone"></i> <a href="tel:{{ $about->phone_1 }}" title="{{ $about->phone_1 }}">{{ $about->phone_1 }}</a>
                        </div>
                        <a title="{{ config('constant.constant.call_request.'.$lang) }}" data-toggle="modal" data-target=".bd-example-modal-xl" role="button" class="btn-custom invert capsule">
                          {{ config('constant.constant.call_request.'.$lang) }}
                        </a>
                      </div>

                      <span id="menu-btn"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="header-middle py-1 d-md-none" style="background: transparent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <span class="p-title invert mb-0 w-100 text-center"><a class="text-white" href="tel:{{ $about->phone_1 }}" title="{{ $about->phone_1 }}">{{ $about->phone_1 }}</a></span>
      </div>
      <div class="col-6">
        <span class="p-title invert mb-0 w-100 text-center"><a class="text-white" data-toggle="modal" data-target=".bd-example-modal-xl" role="button" title="{{ config('constant.constant.call_request.'.$lang) }}">{{ config('constant.constant.call_request.'.$lang) }}</a></span>
      </div>
    </div>
  </div>
</div>
