@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>О НАС</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('abouts.store')}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'Название компании', 'name' => 'company', 'required' => 'true', 'max' => '60', 'help' => '' ])

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'Слоган', 'name' => 'tagline', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'Заголовок', 'name' => 'name', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Короткое описание, СЕО', 'name' => 'title', 'required' => 'true', 'max' => '320' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Описание', 'name' => 'body', 'required' => 'true', 'max' => '', 'editor' => 'true' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Адрес', 'name' => 'address', 'required' => 'true', 'max' => '320' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'График работы', 'name' => 'hour', 'required' => 'true', 'max' => '', 'editor' => 'true' ])

    @include('cpanel.form_parts.textarea', ['data' => '', 'label' => 'IFRAME карта', 'title' => 'GOOGLE карта локации', 'name' => 'map', 'required' => 'true', 'max' => '', 'editor' => 'false' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '240x40px', 'title' => 'LOGO', 'name' => 'logo', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '25x25px', 'title' => 'FAVICON', 'name' => 'favicon', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '1920x1000px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ГЛАВНОЕ', 'name' => 'image', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.files', ['data' => '', 'label' => '1920x900px', 'title' => 'ФАЙЛЫ - ИЗОБРАЖЕНИЯ ДЛЯ ГАЛЛЕРЕИ', 'required' => 'false', 'max' => '', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'EMAIL', 'name' => 'email', 'required' => 'false', 'max' => '100', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'Телефон 1', 'name' => 'phone_1', 'required' => 'false', 'max' => '100', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'Телефон 2', 'name' => 'phone_2', 'required' => 'false', 'max' => '100', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'FACEBOOK ссылка', 'name' => 'facebook', 'required' => 'false', 'max' => '140', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'INSTAGRAM ссылка', 'name' => 'instagram', 'required' => 'false', 'max' => '140', 'help' => '' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть информацию о нас?', 'name' => 'show', 'checked' => '0' ])

    @include('cpanel.form_parts.create')

  </form>
@endsection
