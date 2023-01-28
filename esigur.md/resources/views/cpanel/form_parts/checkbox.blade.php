<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">{{$title}}</h2>
    </header>
    <div class="panel-body">
        <div class="form-group">
          @foreach ($data as $key => $step)
            <div class="col-md-12">
              <label class="col-md-3 control-label">
                  <span class="title">{{$step->name->ru}}</span>
              </label>
              <div class="col-md-9">
                  <div class="checkbox-custom">
                    <input type="checkbox" name="{{ $name }}[]" value="{{$step->id}}" {{($check->{$name}()->find($step->id))? 'checked' : ''}}>
                    <label></label>
                  </div>
              </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
