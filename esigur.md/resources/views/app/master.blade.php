<!DOCTYPE html>
<html lang="{{ $lang }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="WEBCRAFT" />
        <meta name="theme-color" content="#008037">
        <meta name="copyright"content="ESIGUR">
        <meta name="language" content="{{ $lang }}">

        <meta name="google-site-verification" content="mcErkRIrIxfRBfrQ6KwO7tWy_Nq09EeRhPkSZyriz0o"/>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MBRWW9V');</script>
        <!-- End Google Tag Manager -->

        @yield('meta')

        <link rel="alternate" hreflang="en" href="{{LaravelLocalization::getLocalizedURL('en')}}">
        <link rel="alternate" hreflang="ro" href="{{LaravelLocalization::getLocalizedURL('ro')}}">
        <link rel="alternate" hreflang="ru" href="{{LaravelLocalization::getLocalizedURL('ru')}}">
        <link rel="alternate" hreflang="x-default" href="{{LaravelLocalization::getLocalizedURL('ro')}}">
        <link rel="canonical" href="{{url()->current()}}" />
        <link rel="shortcut icon" href="/files/{{$about->favicon}}" type="image/x-icon"/>
        <!--[if lt IE 9]>
            <script src="/assets/js/html5shiv.js"></script>
        <![endif]-->

        <script>
            WebFontConfig = {
                google: { families: [ 'Roboto:300,400,500,600,700,800,900' ] }
            };
            ( function ( d ) {
                var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
                wf.src = '/assets/js/webfont.js';
                wf.async = true;
                s.parentNode.insertBefore( wf, s );
            } )( document );
        </script>

        <!-- CSS Files ================================================== -->
        <link href="/assets/css/jpreloader.css" rel="stylesheet" type="text/css">
        <link id="bootstrap" href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link id="bootstrap-grid" href="/assets/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
        <link id="bootstrap-reboot" href="/assets/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/animate.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/owl.carousel.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/owl.theme.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/owl.transitions.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/magnific-popup.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/jquery.countdown.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/style.css?{{ time() }}" rel="stylesheet" type="text/css" />
        <!-- color scheme -->
        <link id="colors" href="/assets/css/colors/scheme-03.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/coloring.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MBRWW9V"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <div id="wrapper">
            @include('app.part.header')
            <!-- content begin -->
            <div class="no-bottom no-top" id="content">
                <div id="top"></div>
                @yield('content')
            </div>
            <!-- content close -->
            <a href="#" id="back-to-top"></a>
            @include('app.part.footer')
        </div>

        <!-- Javascript Files ================================================== -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/jpreLoader.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/jquery.isotope.min.js"></script>
        <script src="/assets/js/easing.js"></script>
        <script src="/assets/js/owl.carousel.js"></script>
        <script src="/assets/js/validation.js"></script>
        <script src="/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/js/enquire.min.js"></script>
        <script src="/assets/js/jquery.stellar.min.js"></script>
        <script src="/assets/js/jquery.plugin.js"></script>
        <script src="/assets/js/typed.js"></script>
        <script src="/assets/js/jquery.countTo.js"></script>
        <script src="/assets/js/jquery.countdown.js"></script>
        <script src="/assets/js/typed.js"></script>
        <script src="/assets/js/designesia.js?v={{ time() }}"></script>

        @yield('script')

        <div class="modal fade text-dark bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle-2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle-2">{{ config('constant.constant.call_request.'.$lang) }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
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
                  @csrf
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
              e.preventDefault();

              document.querySelector(this.getAttribute('href')).scrollIntoView({
                  behavior: 'smooth'
              });
          });
        });
        </script>

        <script>
        $(function () {
            // jquery typed plugin
            $(".typed").typed({
                stringsElement: $('.typed-strings'),
                typeSpeed: 100,
                backDelay: 1500,
                loop: true,
                contentType: 'html', // or text
                // defaults to false for infinite loop
                loopCount: false,
                callback: function () { null; },
                resetCallback: function () { newTyped(); }
            });
        });
      </script>
      
      <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "168214524940837");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ro_RO/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    </body>
</html>
