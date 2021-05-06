@extends('layouts.layout')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Reader</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('reader.index') }}">Reader list</a></li>
              <li class="breadcrumb-item active">Create Reader</li>
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
                <h3 class="card-title">Create Reader</h3>
              </div>

              @include('message-error')

              <!-- /.card-header -->
              <form role="form" action="{{ route('reader.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" placeholder="Reader first and second names ...">
                  </div>

                  <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                      @foreach (\App\Enums\GenderType::ARRAY_GENDER as $key => $gender)
                        <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : '' }}>{{ $gender }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Reader age</label>
                    <input type="number" name="age" value="{{ old('age') }}" class="form-control @error('age') is-invalid @enderror" placeholder="Reader age ...">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Reader address</label>
                      <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Reader address ...">
                        {{ old('address') }}
                      </textarea>
                  </div>
                </div>

                <div class="card-footer">
                  <a href="{{ route('reader.index') }}" class="btn btn-default">Quay lại</a>
                  <button type="submit" class="btn btn-primary">Create Reader</button>
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
