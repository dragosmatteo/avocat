@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ СОТРУДНИКА</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('teams.update',$team)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $team->name, 'label' => $locales, 'title' => 'ФИО', 'name' => 'name', 'required' => 'true', 'max' => '60' ])

    @include('cpanel.form_parts.string', ['data' => $team->title, 'label' => $locales, 'title' => 'Должность', 'name' => 'title', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.input', ['data' => $team->phone, 'title' => 'Телефон', 'name' => 'phone', 'required' => 'true', 'max' => '60', 'help' => '' ])

    @include('cpanel.form_parts.input', ['data' => $team->email, 'title' => 'EMAIL', 'name' => 'email', 'required' => 'true', 'max' => '60', 'help' => '' ])

    @include('cpanel.form_parts.file', ['data' => 'teams/lg/'.$team->image, 'label' => '400x600px', 'title' => 'ФАЙЛ - ИЗОБРАЖЕНИЕ ДЛЯ СОТРУДНИКА', 'name' => 'image', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.number', ['data' => $team->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть сотрудника?', 'name' => 'show', 'checked' => $team->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
