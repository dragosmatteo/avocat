@extends('cpanel.app.master')

@section('content')
  <header class="page-header">
    <h2>ВСЕ ОТЗЫВЫ</h2>
  </header>

  <section class="panel">


    <div class="panel-body">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-md">
            <a href="{{route('testimonials.create')}}" class="btn btn-primary text-uppercase">ДОБАВИТЬ</a>
          </div>
        </div>
      </div>
      <table class="table table-bordered table-striped mb-none" id="datatable-editable">
        <thead>
          <tr>
            <th>СОРТИРОВКА</th>
            <th>ИМЯ</th>
            <th>ОТОБРАЖЕНИЕ</th>
            <th>ДЕЙСТВИЕ</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($testimonials as $testimonial)
            <tr class="gradeX">
              <td style="width: 140px">
                <form class="" action="{{route('testimonials.update',$testimonial)}}" method="post">
                  <div class="input-group">
                    <input type="number" onchange="setTimeout(function() { form.submit(); }, 500)" name="order" class="spinner-input form-control" min="1" maxlength="3" value="{{$testimonial->order}}">
                  </div>
                  @csrf
                  @method('put')
                </form>
              </td>
              <td>{{$testimonial->name->ru}}</td>
              <td>{{($testimonial->show == 0)? 'ОТОБРАЖАЕТСЯ' : 'СКРЫТ'}}</td>
              <td class="actions border-0">
                <a class="btn btn-primary" href="{{route('testimonials.edit',$testimonial)}}"><i class="fa fa-pencil"></i> </a>
                <form class="" action="{{route('testimonials.destroy',$testimonial)}}" method="post">
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
