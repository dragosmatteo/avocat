<section aria-label="section" class="" data-bgimage="url(/files/sliders/lg/{{$slider->image.'.jpg'}}) top left">
    <div class="v-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".5s"></div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".5s">
                    <div class="padding30 rounded img-shadow row" data-bgcolor="rgba(240, 246, 234, .9)">
                        <div class="col-lg-12 p-1">
                          <h2><span class="id-color">{{$slider->title->$lang}}</span></h2>
                        </div>

                        @foreach ($app_services_all as $key => $serv)
                          <div class="col-lg-4 col-6 d-flex p-1">
                            <a title="{{ $serv->name->$lang }}" href="{{ route('service.show',$serv) }}" class="icon-box rounded w-100">
                                {{-- <i class="icofont-group"></i> --}}
                                <img width="75" src="/files/services/lg/{{ $serv->icon.'.png' }}" alt="">
                                <span class="px-1">{{ $serv->name->$lang }}</span>
                            </a>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
