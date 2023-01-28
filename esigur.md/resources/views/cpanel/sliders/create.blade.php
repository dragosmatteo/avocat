@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>НОВЫЙ СЛАЙД</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Заголовок', 'name' => 'title', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '1920x1080px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ СЛАЙДА', 'name' => 'image', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.create')

  </form>
@endsection
