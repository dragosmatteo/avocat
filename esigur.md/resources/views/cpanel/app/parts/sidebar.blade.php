<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <div class="sidebar-widget widget-tasks">
                    <div class="widget-header">
                        <h6>КОНТЕНТ</h6>
                    </div>
                </div>
                <ul class="nav nav-main">

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>Баннер</span>
                        </a>
                        <ul class="nav nav-children">

                            @if ($slider)
                              <li>
                                  <a href="{{route('sliders.edit', $slider)}}">
                                      РЕДАКТИРОВАТЬ
                                  </a>
                              </li>
                            @else
                              <li>
                                  <a href="{{route('sliders.create')}}">
                                      СОЗДАТЬ
                                  </a>
                              </li>
                            @endif
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>ОТЗЫВЫ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('testimonials.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('testimonials.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>БЛОГ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('blogs.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('blogs.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>FAQ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('faqs.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('faqs.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>Почему мы</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('features.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('features.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>ПАРТНЕРЫ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('partners.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('partners.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    <div class="sidebar-widget widget-tasks">
                        <div class="widget-header">
                            <h6>УСЛУГИ</h6>
                        </div>
                    </div>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>ЭТАПЫ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('steps.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('steps.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>ПРЕИМУЩЕСТВА</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('advantages.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('advantages.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>УСЛУГИ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('services.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('services.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>ПОДУСЛУГИ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('parts.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('parts.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>ЦЕНЫ</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{route('prices.index')}}">
                                    ВСЕ
                                </a>
                            </li>
                            <li>
                                <a href="{{route('prices.create')}}">
                                    СОЗДАТЬ
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    <div class="sidebar-widget widget-tasks">
                        <div class="widget-header">
                            <h6>О нас</h6>
                        </div>
                    </div>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>ИНФОРМАЦИЯ</span>
                        </a>
                        <ul class="nav nav-children">

                            @if ($about)
                              <li>
                                  <a href="{{route('abouts.edit', $about)}}">
                                      РЕДАКТИРОВАТЬ
                                  </a>
                              </li>
                            @else
                              <li>
                                  <a href="{{route('abouts.create')}}">
                                      СОЗДАТЬ
                                  </a>
                              </li>
                            @endif

                        </ul>
                    </li>

                </ul>
            </nav>

            <hr class="separator" />

        </div>
    </div>
</aside>
