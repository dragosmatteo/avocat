@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>НОВЫЙ ПАРТНЕР</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('partners.store')}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'НАЗВАНИЕ', 'name' => 'name', 'required' => 'true', 'max' => '60' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '275x250px', 'title' => 'ЛОГОТИП', 'name' => 'image', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.number', ['data' => '', 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть партнера?', 'name' => 'show', 'checked' => '0' ])

    @include('cpanel.form_parts.create')

  </form>
@endsection
