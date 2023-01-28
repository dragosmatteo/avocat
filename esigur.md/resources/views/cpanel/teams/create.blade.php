@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>НОВЫЙ СОТРУДНИК</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'ФИО', 'name' => 'name', 'required' => 'true', 'max' => '60' ])

    @include('cpanel.form_parts.string', ['data' => '', 'label' => $locales, 'title' => 'Должность', 'name' => 'title', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'Телефон', 'name' => 'phone', 'required' => 'true', 'max' => '60', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => '', 'title' => 'EMAIL', 'name' => 'email', 'required' => 'true', 'max' => '60', 'help' => '' ])

    @include('cpanel.form_parts.file', ['data' => '', 'label' => '400x600px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ СОТРУДНИКА', 'name' => 'image', 'required' => 'true', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.number', ['data' => '', 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть СОТРУДНИКА?', 'name' => 'show', 'checked' => '0' ])

    @include('cpanel.form_parts.create')

  </form>
@endsection
