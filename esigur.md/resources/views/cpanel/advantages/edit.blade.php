@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ ПРЕИМУЩЕСТВО</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('advantages.update',$advantage)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $advantage->name, 'label' => $locales, 'title' => 'НАЗВАНИЕ', 'name' => 'name', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.text', ['data' => $advantage->body, 'label' => $locales, 'title' => 'ОПИСАНИЕ', 'name' => 'body', 'required' => 'false', 'max' => '1500' ])

    @include('cpanel.form_parts.number', ['data' => $advantage->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть приемущество?', 'name' => 'show', 'checked' => $advantage->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
