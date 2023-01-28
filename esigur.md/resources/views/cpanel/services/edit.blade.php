@extends('cpanel.app.master')

@section('content')
<header class="page-header">
    <h2>РЕДАКТИРОВАТЬ УСЛУГУ</h2>
</header>

<form id="form1" class="form-horizontal" action="{{route('services.update',$service)}}" method="post" enctype="multipart/form-data">

    <div class="tabs">
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#popular11" data-toggle="tab" aria-expanded="true"><i class="fa fa-star"></i> ОСНОВНОЕ</a>
            </li>
            <li class="">
                <a href="#recent11" data-toggle="tab" aria-expanded="false"> ПРИВЯЗКА</a>
            </li>
        </ul>

        <div class="tab-content">
          <div id="popular11" class="tab-pane active">
            @include('cpanel.form_parts.alert')

            @include('cpanel.form_parts.string', ['data' => $service->name, 'label' => $locales, 'title' => 'Заголовок', 'name' => 'name', 'required' => 'true', 'max' => '65' ])

            @include('cpanel.form_parts.text', ['data' => $service->subname, 'label' => $locales, 'title' => 'Подзаголовок', 'name' => 'subname', 'required' => 'false', 'max' => '200' ])

            @include('cpanel.form_parts.text', ['data' => $service->name_seo, 'label' => $locales, 'title' => 'Заголовок СЕО', 'name' => 'name_seo', 'required' => 'true', 'max' => '120' ])

            @include('cpanel.form_parts.text', ['data' => $service->title, 'label' => $locales, 'title' => 'Описание СЕО', 'name' => 'title', 'required' => 'true', 'max' => '320' ])

            @include('cpanel.form_parts.text', ['data' => $service->body, 'label' => $locales, 'title' => 'Описание', 'name' => 'body', 'required' => 'true', 'max' => '', 'editor' => 'true' ])

            @include('cpanel.form_parts.input', ['data' => $service->slug, 'title' => 'SLUG - гиперссылка страницы услуги', 'name' => 'slug', 'required' => 'true', 'max' => '60', 'help' => 'slug' ])

            @include('cpanel.form_parts.file', ['data' => 'services/lg/'.$service->icon, 'label' => '100x100px', 'title' => 'ИКОНКА', 'name' => 'icon', 'required' => 'false', 'max' => '', 'help' => 'link', 'type' => 'png' ])

            @include('cpanel.form_parts.file', ['data' => 'services/lg/'.$service->image, 'label' => '1600x1600px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ услуги', 'name' => 'image', 'required' => 'false', 'max' => '', 'help' => 'link' ])

            @include('cpanel.form_parts.number', ['data' => $service->views, 'label' => 'Уникальны в течении 1 дня', 'title' => 'Просмотры', 'name' => 'views', 'required' => 'true' ])

            @include('cpanel.form_parts.number', ['data' => $service->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

            @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть услугу?', 'name' => 'show', 'checked' => $service->show ])
          </div>

          <div id="recent11" class="tab-pane">
            @if ($parts->count() and $service->services->count() == null)
              @include('cpanel.form_parts.checkbox', ['data' => $parts, 'title' => 'Подуслуги', 'check' => $service, 'name' => 'parts'])
            @endif

            {{-- steps --}}
              @include('cpanel.form_parts.string', ['data' => $service->step_title, 'label' => $locales, 'title' => 'Заголовок для этапов', 'name' => 'step_title', 'required' => 'false', 'max' => '120' ])
            @if ($steps->count())
              @include('cpanel.form_parts.checkbox', ['data' => $steps, 'title' => 'Этапы', 'check' => $service, 'name' => 'steps'])
            @endif

            {{-- advantages --}}
              @include('cpanel.form_parts.string', ['data' => $service->advantage_title, 'label' => $locales, 'title' => 'Заголовок для приемуществ', 'name' => 'advantage_title', 'required' => 'false', 'max' => '120' ])
            @if ($advantages->count())
              @include('cpanel.form_parts.checkbox', ['data' => $advantages, 'title' => 'Приемущества', 'check' => $service, 'name' => 'advantages'])
            @endif

            {{-- faqs --}}
              @include('cpanel.form_parts.string', ['data' => $service->faq_title, 'label' => $locales, 'title' => 'Заголовок для FAQ', 'name' => 'faq_title', 'required' => 'false', 'max' => '120' ])
            @if ($faqs->count())
              @include('cpanel.form_parts.checkbox', ['data' => $faqs, 'title' => 'FAQ', 'check' => $service, 'name' => 'faqs'])
            @endif

          </div>
        </div>
    </div>

    @include('cpanel.form_parts.edit')

</form>
@endsection
