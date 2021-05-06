@extends('layouts.layout')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reader management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Readers list</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-left form-inline">
                <h3 class="card-title">Readers list</h3>
              </div>
              <div class="float-right">
                <a href="{{ route('reader.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus-circle"></i> Create</a>
              </div>
            </div>

          @include('message-error')

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
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if (count($readers) != 0)
                    @foreach($readers as $key => $reader)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $reader->full_name }}</td>
                        <td>{{ \App\Enums\GenderType::getDisplayGender($reader->gender) }}</td>
                        <td>{{ $reader->age }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>
                          <a href="{{ route('reader.edit', $reader->id) }}"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="12" class="text-center">Reader empty</td>
                    </tr>
                  @endif
                  </tbody>
                </table>
              </div>
            </div>

            <div class="flex-center">
              {{ $readers->appends(request()->except('page'))->links() }}
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

