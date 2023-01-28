@extends('cpanel.app.master')

@section('content')
    <header class="page-header">
      <h2>Главная</h2>
    </header>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('static.update','constant')}}" enctype="multipart/form-data" method="POST">

                      @foreach ($constants as $key => $constant)
                        <div class="bg-light p-4">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group" style="border-bottom: none">
                                <label class="col-md-3 control-label" for="{{$key}}RU">RU</label>
                                <div class="col-md-12">
                                  <textarea class="form-control" name="{{$key}}[ru]" rows="3" id="{{$key}}RU">{{ $constant['ru'] }}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group" style="border-bottom: none">
                                <label class="col-md-3 control-label" for="{{$key}}RO">RO</label>
                                <div class="col-md-12">
                                  <textarea class="form-control" name="{{$key}}[ro]" rows="3" id="{{$key}}RO">{{ $constant['ro'] }}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group" style="border-bottom: none">
                                <label class="col-md-3 control-label" for="{{$key}}EN">EN</label>
                                <div class="col-md-12">
                                  <textarea class="form-control" name="{{$key}}[en]" rows="3" id="{{$key}}EN">{{ $constant['en'] }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                      @endforeach

                      @csrf

                      <div class="form-group row text-left">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                          <button type="submit" class="btn btn-space btn-primary">Обновить</button>
                        </div>
                      </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
