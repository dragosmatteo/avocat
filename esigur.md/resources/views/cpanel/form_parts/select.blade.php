@if ($data->count())
  <section class="panel">
    <header class="panel-heading">
      <h2 class="panel-title">{{$title}} <span class="text-danger">{{ ($required == 'true')? '*' : '' }}</span></h2>
    </header>
    <div class="panel-body">
      <div class="form-group">
        <label class="col-md-3 control-label">
          <span class="title"></span>
        </label>
        <div class="col-md-6">
          <select class="form-control mb-md" name="{{ $name }}" {{ ($required == 'true')? 'required' : '' }}>
              <option></option>
            @foreach ($data as $key => $val)
              <option value="{{ $val->id }}" {{ ($value == $val->id)? 'selected' : '' }}>{{$val->name->ru}}</option>
            @endforeach
  				</select>
        </div>
      </div>
    </div>
  </section>
@endif
