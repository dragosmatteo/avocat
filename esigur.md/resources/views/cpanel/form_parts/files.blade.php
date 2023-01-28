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
                            <input type="file" name="files[]" {{ ($required == 'true')? 'required' : '' }} accept="image/*" multiple/>
                        </span>
                        <span class="help-block">Форматы файла .png .jpg .jpeg</span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
        @if ($data)
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
              <div class="row">
                @foreach ($data as $key => $image)
                  @if ($image)
                    <div class="col-lg-3">
                      <div class="panel border">
        								<header class="panel-heading">
        									<div class="panel-actions">
        										<a title="Удалить файл" href="{{route($section.'-delete-image', [$value, $key, $image])}}" onclick="return confirm_delete()">
                              <i class="fa fa-times"></i>
                            </a>
        									</div>
        									<h2 class="panel-title">&nbsp;</h2>
        								</header>
        								<div class="panel-body bg-grey">
        									<div class="owl-carousel owl-theme owl-carousel-init">
        										<div class="owl-wrapper-outer">
                              <div class="owl-wrapper">
                                <div class="owl-item">
                                  <div class="item">
        											      <img src="/files/{{ $section }}/lg/{{$image.'.jpg'}}" class="img-responsive">
              										</div>
                                </div>
                              </div>
                            </div>
        									</div>
        								</div>
        							</div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        @endif
    </div>
</section>
