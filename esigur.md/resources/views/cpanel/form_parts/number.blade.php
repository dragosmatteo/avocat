<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">{{$title}} <span class="text-danger">{{ ($required == 'true')? '*' : '' }}</span></h2>
    </header>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-md-3 control-label">
                <span class="title">{{ $label }}</span>
            </label>
            <div class="col-md-6">
              <div data-plugin-spinner data-plugin-options='{ "value":0, "min": 0, "max": 99999 }'>
                <div class="input-group">
                  <input type="text" name="{{$name}}" class="spinner-input form-control" value="{{(!empty($data))? $data : ''}}">
                  <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                      <i class="fa fa-angle-up"></i>
                    </button>
                    <button type="button" class="btn btn-default spinner-down">
                      <i class="fa fa-angle-down"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
