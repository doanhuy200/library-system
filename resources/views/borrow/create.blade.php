@extends('layouts.layout')

@section('customCss')
  <link rel="stylesheet" href="{{ asset("css/custom.css") }}">

  <link rel="stylesheet" href="{{ asset("plugins/datepicker/datepicker3.css") }}">
@endsection

@section('customJs')
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.vi.js') }}"></script>
  <script>
    $(function() {
      $('input[name="expired_at"]').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true,
      });
    });
  </script>
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Borrow</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('borrow.index') }}">Borrow list</a></li>
              <li class="breadcrumb-item active">Create Borrow</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-expired_at">Create Borrow</h3>
              </div>

              @include('message-error')

              <!-- /.card-header -->
              <form role="form" action="{{ route('borrow.store', $book->id) }}" method="POST">
                @csrf
                <div class="card-body">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Expired at</label>
                    <input type="text" class="form-control @error('expired_at') is-invalid @enderror" name="expired_at" value="{{ old('expired_at') }}">
                  </div>

                  <div class="form-group">
                    <label>Reader</label>
                    <select name="reader_id" class="form-control @error('reader_id') is-invalid @enderror">
                      <option>Choose Author for borrow</option>
                      @foreach ($readers as $reader)
                        <option value="{{ $reader->id }}" {{ old('reader_id') == $reader->id ? 'selected' : '' }}>{{ $reader->full_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="card-footer">
                  <a href="{{ route('borrow.index') }}" class="btn btn-default">Quay lại</a>
                  <button type="submit" class="btn btn-primary">Create Borrow</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>
@endsection
