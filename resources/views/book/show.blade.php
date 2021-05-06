@extends('layouts.layout')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Book list</a></li>
              <li class="breadcrumb-item active">Detail Book</li>
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
                <h3 class="card-title">Detail Book</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" value="{{ $book->title }}" placeholder="Book title ..." disabled>
                </div>

                <div class="form-group">
                  <label>Languages</label>
                  <input type="text" class="form-control" value="{{ $book->languages }}" placeholder="Languages ..." disabled>
                </div>

                <div class="form-group">
                  <label>Author</label>
                  <input type="text" class="form-control" value="{{ $book->author->name ?? '' }}" placeholder="Languages ..." disabled>
                </div>
              </div>

              <div class="card-footer">
                <a href="{{ route('book.index') }}" class="btn btn-default">Quay lại</a>
              </div>

              <div class="card-header">
                <h3 class="card-title">History borrow book</h3>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr class="background-table-one">
                      <th>#</th>
                      <th>Full name</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($book->readers) != 0)
                      @foreach($book->readers as $reader)
                        <tr>
                          <td>{{ $reader->id }}</td>
                          <td>{{ $reader->full_name }}</td>
                          <td>{{ \App\Enums\GenderType::getDisplayGender($reader->gender) }}</td>
                          <td>{{ $reader->age }}</td>
                          <td>{{ $reader->address }}</td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="12" class="text-center">Not yet reader borrow</td>
                      </tr>
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
  </div>
@endsection
