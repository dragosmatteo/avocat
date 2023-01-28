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
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fa fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Сменить</span>
                            <span class="fileupload-new">Выбрать</span>
                            <input type="file" name="{{$name}}" {{ ($required == 'true')? 'required' : '' }} accept="image/*"/>
                        </span>
                        <span class="help-block">Форматы файла .png .jpg .jpeg</span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Удалить</a>
                    </div>
                </div>
            </div>
        </div>

        @if ($data)
          <div class="form-group">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              @if (isset($type) and $type == 'original')
                <img src="/files/{{$data}}" class="img-responsive" width="100">
              @elseif (isset($type) and $type == 'png')
                <img src="/files/{{$data.'.png'}}" class="img-responsive" width="100">  
              @else
                <img src="/files/{{$data.'.jpg'}}" class="img-responsive" width="300">
              @endif
            </div>
          </div>
        @endif
    </div>
</section>
