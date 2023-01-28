@extends('app.master')

@section('meta')
<title>{{$blog->name->$lang}}</title>
<meta name="description" content="{{$blog->title->$lang}}" />

<meta property="og:type" content="website" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:title" content="{{$blog->name->$lang}}" />
<meta property="og:description" content="{{$blog->title->$lang}}" />
@endsection

@section('content')
<section id="subheader" data-bgcolor="#f5f7f0">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="spacer-single"></div>
                    <h1>{{$blog->name->$lang}}</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section aria-label="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-read">
                  <picture>
                    <source srcset="/files/blogs/lg/{{$blog->image.'.webp'}}" type="image/webp" media="(min-width: 1025px)">
                    <source srcset="/files/blogs/lg/{{$blog->image.'.jpg'}}" type="image/jpeg" media="(min-width: 1025px)">
                    <source srcset="/files/blogs/md/{{$blog->image.'.webp'}}" type="image/webp" media="(min-width: 415px)">
                    <source srcset="/files/blogs/md/{{$blog->image.'.jpg'}}" type="image/jpeg" media="(min-width: 415px)">
                    <source srcset="/files/blogs/sm/{{$blog->image.'.webp'}}" type="image/webp">
                    <source srcset="/files/blogs/sm/{{$blog->image.'.jpg'}}" type="image/jpeg">
                    <img loading="lazy" id="dsn-hero-parallax-img" class="w-100 has-top-bottom lazyload" data-src="/files/blogs/lg/{{ $blog->image.'.webp' }}" alt="{{ $blog->name->$lang }}" data-dsn-header="blog" data-dsn-ajax="img">
                  </picture>
                  <div class="post-text">
                    {!! $blog->body->$lang !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
