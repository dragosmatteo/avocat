<header class="header">
  <div class="logo-container">
    <a href="{{route('cp-home')}}" class="logo">
      <img src="/cpanel/images/logo.png" height="35" alt="JSOFT Admin" />
    </a>
    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <!-- start: search & user box -->
  <div class="header-right">

    <span class="separator"></span>

    <ul class="notifications">
      <li>
        <a title="Почистить кэш сайта" href="{{route('cache.clear')}}" class="dropdown-toggle notification-icon">
          <i class="fa fa-refresh"></i>
          {{-- <span class="badge">4</span> --}}
        </a>
      </li>
    </ul>

    <span class="separator"></span>




    <div id="userbox" class="userbox">
      <a href="#" data-toggle="dropdown">
        <figure class="profile-picture">
          <img src="/cpanel/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="/cpanel/images/!logged-user.jpg" />
        </figure>
        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
          <span class="name">{{ config('app.name', 'Webcraft') }}</span>
          <span class="role">administrator</span>
        </div>

        <i class="fa custom-caret"></i>
      </a>

      <div class="dropdown-menu">
        <ul class="list-unstyled">
          <li class="divider"></li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end: search & user box -->
</header>
