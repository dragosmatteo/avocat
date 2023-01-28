<section class="no-top no-bottom relative z1000">
    <div class="container">
        <div class="row mt-100">
          @foreach ($app_services_all as $key => $serv)
            <div class="col-md-4 mb-3">
                <div class="mask rounded img-shadow">
                    <div class="cover rounded">
                        <div class="c-inner">
                            <h3 class="text-center pl-0">{{$serv->name->$lang}}</h3>
                            <p>{{$serv->subname->$lang}}</p>
                            <div class="spacer20"></div>
                            <a title="{{ $serv->name->$lang }}" href="{{ route('service.show',$serv) }}" class="btn-custom invert capsule">
                              {{ config('constant.constant.more.'.$lang) }}
                            </a>
                        </div>
                    </div>
                    <picture>
                        <source srcset="/files/services/lg/{{$serv->image.'.webp'}}" type="image/webp" media="(min-width: 1025px)">
                        <source srcset="/files/services/lg/{{$serv->image.'.jpg'}}" type="image/jpeg" media="(min-width: 1025px)">
                        <source srcset="/files/services/md/{{$serv->image.'.webp'}}" type="image/webp" media="(min-width: 769px)">
                        <source srcset="/files/services/md/{{$serv->image.'.jpg'}}" type="image/jpeg" media="(min-width: 769px)">
                        <source srcset="/files/services/sm/{{$serv->image.'.webp'}}" type="image/webp">
                        <source srcset="/files/services/sm/{{$serv->image.'.jpg'}}" type="image/jpeg">
                        <img loading="lazy" src="/files/services/lg/{{ $serv->image.'.jpg' }}" data-src="/files/services/lg/{{ $serv->image.'.jpg' }}" alt="{{$serv->name->$lang}}" width="280" height="280">
                    </picture>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
