@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ ПАРТНЕРА</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('partners.update',$partner)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $partner->name, 'label' => $locales, 'title' => 'Название', 'name' => 'name', 'required' => 'true', 'max' => '60' ])

    @include('cpanel.form_parts.file', ['data' => '/partners/lg/'.$partner->image, 'label' => '275x250px', 'title' => 'ЛОГОТИП', 'name' => 'image', 'required' => 'false', 'max' => '', 'help' => 'link' ])

    @include('cpanel.form_parts.number', ['data' => $partner->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть партнера?', 'name' => 'show', 'checked' => $partner->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
