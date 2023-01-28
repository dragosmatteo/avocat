@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ БЛОГ</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('prices.update',$price)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $price->name, 'label' => $locales, 'title' => 'Заголовок', 'name' => 'name', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.number', ['data' => $price->price, 'label' => 'валюта евро', 'title' => 'Цена', 'name' => 'price', 'required' => 'true'])

    @include('cpanel.form_parts.number', ['data' => $price->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть цену?', 'name' => 'show', 'checked' => $price->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
