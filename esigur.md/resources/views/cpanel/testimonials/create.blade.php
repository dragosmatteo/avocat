@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>НОВЫЙ ОТЗЫВ</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('testimonials.store')}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'ФИО', 'name' => 'name', 'required' => 'true', 'max' => '60' ])

    @include('cpanel.form_parts.text', ['data' => '', 'label' => $locales, 'title' => 'Отзыв', 'name' => 'body', 'required' => 'true', 'max' => '500' ])

    @include('cpanel.form_parts.number', ['data' => '', 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть отзыв?', 'name' => 'show', 'checked' => '0' ])

    @include('cpanel.form_parts.create')

  </form>
@endsection
