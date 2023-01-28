<footer class="footer" class="bg-color text-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="widget">
          <h5>{{config('constant.constant.services.'.$lang)}}</h5>
          <ul>
            @foreach ($app_services_all as $key => $serv)
            <li>
              <a title="{{ $serv->name->$lang }}" href="{{ route('service.show',$serv) }}">{{ $serv->name->$lang }}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="widget">
          <h5>{{config('constant.constant.info.'.$lang)}}</h5>
          <ul>
            <li><a title="{{ config('constant.constant.blog.'.$lang) }}" href="{{route('blog.index')}}" class="contact d-lg-show">{{ config('constant.constant.blog.'.$lang) }}</a></li>
            <li><a title="{{ config('constant.constant.faq.'.$lang) }}" href="{{route('faq.index')}}" class="contact d-lg-show">{{ config('constant.constant.faq.'.$lang) }}</a></li>
            <li><a title="{{ config('constant.constant.about.'.$lang) }}" href="{{route('about.index')}}" class="contact d-lg-show">{{ config('constant.constant.about.'.$lang) }}</a></li>
            <li><a title="{{ config('constant.constant.contact.'.$lang) }}" href="{{route('contact.index')}}" class="contact d-lg-show">{{ config('constant.constant.contact.'.$lang) }}</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="widget">
          <h5>{{config('constant.constant.contact.'.$lang)}}</h5>
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
      </div>

    </div>
  </div>

  <div class="subfooter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="de-flex">
            <div class="de-flex-col">
              {{$about->company}} {{ date('Y') }} &copy; made by&nbsp;<a target="_blank" href="https://webcraft.md/"> WEBCRAFT</a>
            </div>

            <div class="de-flex-col">
              <div class="social-icons">
                @if ($about->facebook)
                <a target="_blank" href="{{$about->facebook}}"><i class="fa fa-facebook fa-lg"></i></a>
                @endif
                @if ($about->instagram)
                <a target="_blank" href="{{$about->instagram}}"><i class="fa fa-instagram fa-lg"></i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</footer>
