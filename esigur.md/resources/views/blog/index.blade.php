@extends('app.master')

@section('meta')
<title>{{$about->name->$lang}}</title>
<meta name="description" content="{{$about->title->$lang}}" />

<meta property="og:type" content="website" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:title" content="{{$about->name->$lang}}" />
<meta property="og:description" content="{{$about->title->$lang}}" />
@endsection

@section('content')
<section id="subheader" data-bgcolor="#f5f7f0">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="spacer-single"></div>
                    <h1>{{config('constant.constant.blog.'.$lang)}}</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section aria-label="section">
    <div class="container">
        <div class="row">

          @foreach ($blogs as $key => $blog)
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="bloglist item">
                    <div class="post-content">
                        <div class="post-image">
                          <a title="{{$blog->name->$lang}}" href="{{route('blog.show',$blog)}}">
                            <picture>
                              <source srcset="/files/blogs/lg/{{$blog->image.'.webp'}}" type="image/webp" media="(min-width: 1025px)">
                              <source srcset="/files/blogs/lg/{{$blog->image.'.jpg'}}" type="image/jpeg" media="(min-width: 1025px)">
                              <source srcset="/files/blogs/md/{{$blog->image.'.webp'}}" type="image/webp" media="(min-width: 415px)">
                              <source srcset="/files/blogs/md/{{$blog->image.'.jpg'}}" type="image/jpeg" media="(min-width: 415px)">
                              <source srcset="/files/blogs/sm/{{$blog->image.'.webp'}}" type="image/webp">
                              <source srcset="/files/blogs/sm/{{$blog->image.'.jpg'}}" type="image/jpeg">
                              <img loading="lazy" id="dsn-hero-parallax-img" class="w-100 has-top-bottom lazyload" data-src="/files/blogs/lg/{{ $blog->image.'.webp' }}" alt="{{ $blog->name->$lang }}" data-dsn-header="blog" data-dsn-ajax="img">
                            </picture>
                          </a>
                        </div>
                        <div class="post-text">
                            <span class="p-tagline">{{$about->company}}</span>
                            <h4><a title="{{$blog->name->$lang}}" href="{{route('blog.show',$blog)}}">{{$blog->name->$lang}}</a></h4>
                            <div class="mt30 w-100">
                              <a title="{{$blog->name->$lang}}" href="{{route('blog.show',$blog)}}" class="btn-custom invert capsule">
                                {{ config('constant.constant.more.'.$lang) }}
                              </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          @endforeach

        </div>
    </div>
</section>

@endsection
