@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>НОВЫЙ ПОРТФОЛИО</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('works.store')}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'Заголовок', 'name' => 'name', 'required' => 'true', 'max' => '60' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Короткое описание, СЕО', 'name' => 'title', 'required' => 'true', 'max' => '320' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Описание', 'name' => 'body', 'required' => 'true', 'max' => '', 'editor' => 'true' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'SLUG - гиперссылка страницы работы', 'name' => 'slug', 'required' => 'true', 'max' => '60', 'help' => 'slug' ])

    @include('cpanel.form_parts.textarea', ['data' => '', 'title' => 'Video IFRAME', 'name' => 'link', 'label' => '', 'required' => 'false', 'max' => '1000', 'help' => '', 'editor' => 'false' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'Дата разработки сайта', 'name' => 'date', 'required' => 'true', 'max' => '100', 'help' => '' ])

    @include('cpanel.form_parts.select', ['data' => $types, 'title' => 'Тип сайта', 'name' => 'type_id', 'required' => 'true', 'value' => '', 'max' => '', 'help' => '' ])

    @include('cpanel.form_parts.select', ['data' => $testimonials, 'title' => 'Отзыв к сайту', 'name' => 'testimonial_id', 'required' => 'false', 'value' => '', 'max' => '', 'help' => '' ])

    @include('cpanel.form_parts.radio', ['data' => ['Вертикально' => '1', 'Горизонтально' => '0'], 'title' => 'Отображение', 'name' => 'position', 'checked' => '0' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '600x800px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ работы', 'name' => 'image', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.files', ['data' => '', 'label' => '1920x800px', 'title' => 'ФАЙЛЫ - ИЗОБРАЖЕНИЯ ДЛЯ работы', 'required' => 'false', 'max' => '', 'help' => '' ])

    @include('cpanel.form_parts.number', ['data' => '', 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть работу?', 'name' => 'show', 'checked' => '0' ])

    @include('cpanel.form_parts.create')

  </form>
@endsection
