@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ ЭТАП</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('steps.update',$step)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $step->name, 'label' => $locales, 'title' => 'НАЗВАНИЕ', 'name' => 'name', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.text', ['data' => $step->body, 'label' => $locales, 'title' => 'ОПИСАНИЕ', 'name' => 'body', 'required' => 'false', 'max' => '1500' ])

    @include('cpanel.form_parts.number', ['data' => $step->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть этап?', 'name' => 'show', 'checked' => $step->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
