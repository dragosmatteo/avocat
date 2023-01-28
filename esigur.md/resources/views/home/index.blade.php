@extends('app.master')

@section('meta')
<title>{{$about->name->$lang}}</title>
<meta name="description" content="{{$about->title->$lang}}"/>

<meta property="og:type"   content="website" />
<meta property="og:url"    content="{{url()->current()}}" />
<meta property="og:title"  content="{{$about->name->$lang}}" />
<meta property="og:description"  content="{{$about->title->$lang}}" />
@endsection

@section('content')

@include('home.part.slider')
@include('home.part.about')
@include('home.part.service')
@include('home.part.review')
@include('home.part.feature')
@include('home.part.action')

@endsection
