@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ О НАС</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('abouts.update',$about)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.input', ['data' => $about->company, 'title' => 'Название компании', 'name' => 'company', 'required' => 'true', 'max' => '60', 'help' => '' ])

    @include('cpanel.form_parts.string', ['data' => $about->tagline, 'label' => $locales, 'title' => 'Слоган', 'name' => 'tagline', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.string', ['data' => $about->name, 'label' => $locales, 'title' => 'Заголовок СЕО', 'name' => 'name', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.text', ['data' => $about->title, 'label' => $locales, 'title' => 'Короткое описание, СЕО', 'name' => 'title', 'required' => 'true', 'max' => '320' ])

    @include('cpanel.form_parts.text', ['data' => $about->body, 'label' => $locales, 'title' => 'Описание', 'name' => 'body', 'required' => 'true', 'max' => '', 'editor' => 'true' ])

    @include('cpanel.form_parts.text', ['data' => $about->address, 'label' => $locales, 'title' => 'Адрес', 'name' => 'address', 'required' => 'true', 'max' => '320' ])

    @include('cpanel.form_parts.text', ['data' => $about->hour, 'label' => $locales, 'title' => 'График работы', 'name' => 'hour', 'required' => 'true', 'max' => '', 'editor' => 'false' ])

    @include('cpanel.form_parts.textarea', ['data' => $about->map, 'label' => 'IFRAME карта', 'title' => 'GOOGLE карта локации', 'name' => 'map', 'required' => 'true', 'max' => '', 'editor' => 'false' ])

    @include('cpanel.form_parts.file', ['data' => 'abouts/lg/'.$about->logo.'.jpg', 'type' => 'original', 'label' => '240x40px', 'title' => 'LOGO', 'name' => 'logo', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.file', ['data' => $about->favicon, 'type' => 'original', 'label' => '25x25px', 'title' => 'FAVICON', 'name' => 'favicon', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.file', ['data' => 'abouts/lg/'.$about->image, 'label' => '1920x1080px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ФОН ОТЫВЫ', 'name' => 'image', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.file', ['data' => 'abouts/lg/'.$about->image_1, 'label' => '1920x1080px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ФОН ФОРМА', 'name' => 'image_1', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    {{-- @include('cpanel.form_parts.files', ['data' => $about->images, 'value' => $about, 'section' => 'abouts', 'label' => '1920x900px', 'title' => 'ФАЙЛЫ - ИЗОБРАЖЕНИЯ ДЛЯ ГАЛЛЕРЕИ', 'required' => 'false', 'max' => '', 'help' => '' ]) --}}

    @include('cpanel.form_parts.input', ['data' => $about->email, 'title' => 'EMAIL', 'name' => 'email', 'required' => 'false', 'max' => '100', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => $about->phone_1, 'title' => 'Телефон 1', 'name' => 'phone_1', 'required' => 'false', 'max' => '100', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => $about->phone_2, 'title' => 'Телефон 2', 'name' => 'phone_2', 'required' => 'false', 'max' => '100', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => $about->facebook, 'title' => 'FACEBOOK ссылка', 'name' => 'facebook', 'required' => 'false', 'max' => '140', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => $about->instagram, 'title' => 'INSTAGRAM ссылка', 'name' => 'instagram', 'required' => 'false', 'max' => '140', 'help' => '' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть информацию о нас?', 'name' => 'show', 'checked' => $about->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
