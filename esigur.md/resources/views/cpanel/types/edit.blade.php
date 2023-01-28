@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ ТИП САЙТА</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('types.update',$type)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $type->name, 'label' => $locales, 'title' => 'Название', 'name' => 'name', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.string', ['data' => $type->title, 'label' => $locales, 'title' => 'Заголовок СЕО', 'name' => 'title', 'required' => 'false', 'max' => '120' ])

    @include('cpanel.form_parts.text', ['data' => $type->body, 'label' => $locales, 'title' => 'Короткое описание, СЕО', 'name' => 'body', 'required' => 'false', 'max' => '320' ])

    @include('cpanel.form_parts.input', ['data' => $type->slug, 'title' => 'SLUG - гиперссылка страницы', 'name' => 'slug', 'required' => 'true', 'max' => '80', 'help' => 'slug' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть тип?', 'name' => 'show', 'checked' => $type->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
