@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ ОСОБЕННОСТЬ</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('features.update',$feature)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $feature->name, 'label' => $locales, 'title' => 'НАЗВАНИЕ', 'name' => 'name', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.text', ['data' => $feature->body, 'label' => $locales, 'title' => 'ОПИСАНИЕ', 'name' => 'body', 'required' => 'true', 'max' => '320', 'editor' => 'false' ])

    @include('cpanel.form_parts.number', ['data' => $feature->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть ОСОБЕННОСТЬ?', 'name' => 'show', 'checked' => $feature->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
