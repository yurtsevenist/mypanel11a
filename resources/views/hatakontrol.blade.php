@if ($errors->any())
    <div class="card alert alert-danger">
        <div class="card-header">
            <h5 class="card-title">Hata</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($errors->any())

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach


            @endif
            @if (Session::has('fail'))
                {{ Session::get('fail') }}
            @endif
            @if (Session::has('success'))
                {{ Session::get('success') }}
            @endif
        </div>
        <!-- /.card-body -->
    </div>
@else
@endif
