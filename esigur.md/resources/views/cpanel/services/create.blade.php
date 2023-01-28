@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>НОВАЯ УСЛУГА</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('services.store')}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'Заголовок', 'name' => 'name', 'required' => 'true', 'max' => '65' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Подзаголовок', 'name' => 'subname', 'required' => 'false', 'max' => '200' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Заголовок СЕО', 'name' => 'name_seo', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Описание СЕО', 'name' => 'title', 'required' => 'true', 'max' => '320' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Описание', 'name' => 'body', 'required' => 'true', 'max' => '', 'editor' => 'true' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'SLUG - гиперссылка страницы услуги', 'name' => 'slug', 'required' => 'true', 'max' => '60', 'help' => 'slug' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '100x100px', 'title' => 'ИКОНКА', 'name' => 'icon', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '1600x1600px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ УСЛУГИ', 'name' => 'image', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.number', ['data' => '', 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть услугу?', 'name' => 'show', 'checked' => '0' ])

    @include('cpanel.form_parts.create')

  </form>
@endsection
