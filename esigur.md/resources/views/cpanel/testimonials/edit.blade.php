@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ ОТЗЫВ</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('testimonials.update',$testimonial)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $testimonial->name, 'label' => $locales, 'title' => 'ФИО', 'name' => 'name', 'required' => 'true', 'max' => '60' ])

    @include('cpanel.form_parts.text', ['data' => $testimonial->body, 'label' => $locales, 'title' => 'Отзыв', 'name' => 'body', 'required' => 'true', 'max' => '500' ])

    @include('cpanel.form_parts.number', ['data' => $testimonial->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть отзыв?', 'name' => 'show', 'checked' => $testimonial->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
