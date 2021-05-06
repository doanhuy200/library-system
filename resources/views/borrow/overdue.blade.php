@extends('layouts.layout')

@section('customJs')
  <script>
    $(".cmdReturnBook").click(function(){
      Swal.fire({
        position: 'center',
        text: 'Are you return this book?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons : false
      }).then((result) => {
        if(result.value) {
          var action = $(this).attr('data-action');
          var formClass = ".form-return-book";
          $(formClass).attr("action", action);
          $(formClass).submit();
        }
      })
    });

    $(".cmdNotify").click(function(){
      Swal.fire({
        position: 'center',
        text: 'Are you notify to reader?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons : false
      }).then((result) => {
        if(result.value) {
          var action = $(this).attr('data-action');
          var formClass = ".form-return-book";
          $(formClass).attr("action", action);
          $(formClass).submit();
        }
      })
    });
  </script>
@endsection

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
              <li class="breadcrumb-item active">Borrows overdue list</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <form action method="post" class="form-group form-return-book">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      </form>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-left form-inline">
                <h3 class="card-title">Borrows overdue list</h3>
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
                    <th>Expired at</th>
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
                        <td>{{ $book->getExpiredAtBorrow() }}</td>
                        <td class="text-center">
                          <button type="button" class="btn btn-outline-primary cmdReturnBook" data-modal="modal-1"
                                  data-action="{{ route('borrow.return', $book->id) }}">
                            <i class="fa fa-id-card" aria-hidden="true"></i> Return
                          </button>
                          <button type="button" class="btn btn-outline-primary cmdNotify" data-modal="modal-1"
                                  data-action="#">
                            <i class="fa fa-mail-reply" aria-hidden="true"></i> Notify
                          </button>
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

