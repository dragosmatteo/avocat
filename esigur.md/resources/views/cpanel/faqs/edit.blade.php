@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>РЕДАКТИРОВАТЬ FAQ</h2>
  </header>

  <form id="form1" class="form-horizontal" action="{{route('faqs.update',$faq)}}" method="post" enctype="multipart/form-data">

    @include('cpanel.form_parts.alert')

    @include('cpanel.form_parts.string', ['data' => $faq->name, 'label' => $locales, 'title' => 'НАЗВАНИЕ', 'name' => 'name', 'required' => 'true', 'max' => '100' ])

    @include('cpanel.form_parts.text', ['data' => $faq->body, 'label' => $locales, 'title' => 'ОПИСАНИЕ', 'name' => 'body', 'required' => 'true', 'max' => '1500', 'editor' => 'true' ])

    @if ($services->count())
      @include('cpanel.form_parts.checkbox', ['data' => $services, 'title' => 'Услуги', 'check' => $faq, 'name' => 'services'])
    @endif

    @include('cpanel.form_parts.number', ['data' => $faq->order, 'label' => 'от меньшего к большему', 'title' => 'Приоритет сортировки', 'name' => 'order', 'required' => 'true' ])

    @include('cpanel.form_parts.radio', ['data' => ['Да' => '1', 'Нет' => '0'], 'title' => 'Скрыть faq?', 'name' => 'show', 'checked' => $faq->show ])

    @include('cpanel.form_parts.edit')

  </form>
@endsection
