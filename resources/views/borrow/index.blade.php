@extends('layouts.layout')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Borrow management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Borrows list</li>
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
                <h3 class="card-title">Borrows list</h3>
              </div>
            </div>

          @include('message-error')

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr class="background-table-one">
                    <th>#</th>
                    <th>Title</th>
                    <th>Languages</th>
                    <th>Author</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if (count($books) != 0)
                    @foreach($books as $key => $book)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->languages }}</td>
                        <td>{{ $book->author->name ?? '' }}</td>
                        <td class="text-center">
                          <a href="{{ route('borrow.create', $book->id) }}" class="btn btn-outline-primary"><i class="fa fa-id-card"></i> Borrow</a>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="12" class="text-center">Borrow empty</td>
                    </tr>
                  @endif
                  </tbody>
                </table>
              </div>
            </div>

            <div class="flex-center">
              {{ $books->appends(request()->except('page'))->links() }}
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

