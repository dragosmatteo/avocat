@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ ПОДУСЛУГУ</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('parts.update',$part)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $part->name, 'label' => $locales, 'title' => 'НАЗВАНИЕ', 'name' => 'name', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.text', ['data' => $part->body, 'label' => $locales, 'title' => 'ОПИСАНИЕ', 'name' => 'body', 'required' => 'true', 'max' => '1500' ])

    @include('cpanel.form_parts.number', ['data' => $part->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть подуслугу?', 'name' => 'show', 'checked' => $part->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
