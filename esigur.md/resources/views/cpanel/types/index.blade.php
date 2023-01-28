@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>ВСЕ ТИПЫ САЙТОВ</h2>
  </header>

  <section class="panel">


    <div class="panel-body">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-md">
            <a href="{{route('types.create')}}" class="btn btn-primary text-uppercase">ДОБАВИТЬ</a>
          </div>
        </div>
      </div>
      <table class="table table-bordered table-striped mb-none" id="datatable-editable">
        <thead>
          <tr>
            <th>НАЗВАНИЕ</th>
            <th>SLUG</th>
            <th>ОТОБРАЖЕНИЕ</th>
            <th>ДЕЙСТВИЕ</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($types as $type)
            <tr class="gradeX">
              <td>{{$type->name->ru}}</td>
              <td>{{ $type->slug }}</td>
              <td>{{($type->show == 0)? 'ОТОБРАЖАЕТСЯ' : 'СКРЫТ'}}</td>
              <td class="actions border-0">
                <a class="btn btn-primary" href="{{route('types.edit',$type)}}"><i class="fa fa-pencil"></i> </a>
                <form class="" action="{{route('types.destroy',$type)}}" method="post">
                  @method('DELETE')
                  {{ csrf_field() }}
                  <button title="Delete" type="submit" class="btn btn-danger" onclick="return confirm_delete()"><i class="fa fa-trash-o"></i> </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection
