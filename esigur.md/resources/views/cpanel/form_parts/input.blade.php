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
        <input
            class="form-control"
              type="text"
                name="{{ $name }}"
                  value="{{ (!empty($data))? $data : '' }}"
                    {{ ($max != '')? "data-plugin-maxlength maxlength=$max" : '' }}
                      {{ ($required == 'true')? 'required' : '' }} >
        @if ($help == 'link')
          <span class="help-block">Копировать ссылку после названия домена и языковой переменной "<span class="text-danger">example.com/ru</span><span class="text-success">/link/to/copy</span>"</span>
        @elseif($help == 'slug')
          <span class="help-block">Только латинскими буквами, без символов "<span class="text-danger">bad.slug</span>" - "<span class="text-success">good-slug</span>"</span>
        @elseif(isset($label))
          <span class="help-block">{{ $label }}</span>
        @endif

      </div>
    </div>
  </div>
</section>
