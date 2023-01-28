<section class="panel">
  <header class="panel-heading">
    <h2 class="panel-title">{{$title}} <span class="text-danger">{{ ($required == 'true')? '*' : '' }}</span></h2>
  </header>
  <div class="panel-body">
    @foreach ($label as $key => $loc)
      <div class="form-group">
        <label class="col-md-3 control-label">
          <span class="title">{{ $key }}</span>
        </label>
        <div class="col-md-6">
          <input
              class="form-control"
                type="text"
                  name="{{ $name }}[{{ $key }}]"
                    value="{{ (!empty($data))? $data->$key : '' }}"
                      {{ ($max != '')? "data-plugin-maxlength maxlength=$max" : '' }}
                        {{ ($required == 'true')? 'required' : '' }} >
        </div>
      </div>
    @endforeach
  </div>
</section>
