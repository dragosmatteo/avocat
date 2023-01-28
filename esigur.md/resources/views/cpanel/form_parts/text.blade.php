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
          <textarea
            class="form-control {{ (isset($editor) and $editor == 'true')? 'textarea' : '' }}"
              name="{{ $name }}[{{ $key }}]"
                {{ ($max != '')? "data-plugin-maxlength maxlength=$max" : '' }}
                  rows="4"
                    cols="80"
                      {{ ($required == 'true')? 'required' : '' }}>{{ (!empty($data))? $data->$key : '' }}</textarea>

        </div>
      </div>
    @endforeach
  </div>
</section>
