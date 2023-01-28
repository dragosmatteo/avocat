<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">{{$title}}</h2>
    </header>
    <div class="panel-body">
        <div class="form-group">
          @foreach ($data as $key => $d)
            <div class="col-md-12">
              <label class="col-md-3 control-label">
                  <span class="title">{{$key}}</span>
              </label>
              <div class="col-md-9">
                  <div class="radio-custom">
                    <input type="radio" name="{{$name}}" value="{{$d}}" {{ ($d == $checked)? 'checked' : '' }}>
                    <label></label>
                  </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
