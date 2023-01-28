@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ БЛОГ</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('blogs.update',$blog)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $blog->name, 'label' => $locales, 'title' => 'Заголовок', 'name' => 'name', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.string', ['data' => $blog->seo_name, 'label' => $locales, 'title' => 'Заголовок СЕО', 'name' => 'seo_name', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.text', ['data' => $blog->title, 'label' => $locales, 'title' => 'Описание СЕО', 'name' => 'title', 'required' => 'true', 'max' => '320' ])

    @include('cpanel.form_parts.text', ['data' => $blog->body, 'label' => $locales, 'title' => 'Описание', 'name' => 'body', 'required' => 'true', 'max' => '', 'editor' => 'true' ])

    @include('cpanel.form_parts.input', ['data' => $blog->slug, 'title' => 'SLUG - гиперссылка страницы блога', 'name' => 'slug', 'required' => 'true', 'max' => '120', 'help' => 'slug' ])

    @include('cpanel.form_parts.file', ['data' => 'blogs/lg/'.$blog->image, 'label' => '1920x1080px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ БЛОГА', 'name' => 'image', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.number', ['data' => $blog->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть блог?', 'name' => 'show', 'checked' => $blog->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
