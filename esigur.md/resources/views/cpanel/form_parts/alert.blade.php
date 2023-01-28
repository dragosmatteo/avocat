@if ($errors->any())
    <section class="panel">
        <div class="panel-body">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
    </section>
@endif
