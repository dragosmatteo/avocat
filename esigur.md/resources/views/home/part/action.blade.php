<section id="calltoaction" data-bgimage="url(/files/abouts/lg/{{$about->image_1.'.jpg'}}) top left" data-stellar-background-ratio=".5">
  <div class="overlay-gradient t50 no-top no-bottom">
    <div class="center-y relative">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 offset-lg-6 wow fadeIn animated" data-wow-delay=".5s" style="background-size: cover; visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
            <div class="box-rounded padding40" data-bgcolor="#ffffff" style="background-color: rgb(255, 255, 255); background-size: cover;">
              <h3 class="mb10">{{ config('constant.constant.request.'.$lang) }}</h3>
              <p>{{ config('constant.constant.call_request_body.'.$lang) }}</p>
              <form class="form-border" method="post" action="{{route('feedback.store')}}">
                <div class="field-set">
                  <input type="text" name="name" class="form-control" placeholder="{{ config('constant.constant.name.'.$lang) }}" required>
                </div>
                <div class="field-set">
                  <input type="text" name="phone" class="form-control" placeholder="{{ config('constant.constant.phone.'.$lang) }}" required>
                </div>
                <div class="field-set">
                  <button type="submit" class="btn btn-custom btn-fullwidth color-2">{{ config('constant.constant.send.'.$lang) }}</button>
                </div>
                @if (isset($service))
                  <input type="hidden" name="service" value="{{ $service }}">
                @endif
                @csrf
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
