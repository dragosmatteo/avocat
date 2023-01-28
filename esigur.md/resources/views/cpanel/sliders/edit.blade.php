@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ СЛАЙД</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('sliders.update',$slider)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.text', ['data' => $slider->title, 'label' => $locales, 'title' => 'Заголовок', 'name' => 'title', 'required' => 'true', 'max' => '120' ])

    @include('cpanel.form_parts.file', ['data' => 'sliders/lg/'.$slider->image, 'label' => '1920x1080px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ СЛАЙДА', 'name' => 'image', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
