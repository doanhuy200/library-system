@extends('layouts.layout')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Book list</a></li>
              <li class="breadcrumb-item active">Book update</li>
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
                <h3 class="card-title">Book update</h3>
              </div>

              @include('message-error')

              <!-- /.card-header -->
              <form role="form" action="{{ route('book.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $book->title) }}" placeholder="Book title ...">
                  </div>

                  <div class="form-group">
                    <label>Languages</label>
                    <input type="text" class="form-control @error('languages_book') is-invalid @enderror" name="languages_book" value="{{ old('languages_book', $book->languages) }}" placeholder="Languages ...">
                  </div>

                  <div class="form-group">
                    <label>Author</label>
                    <select name="author_id" class="form-control @error('author_id') is-invalid @enderror">
                      <option>Choose Author for book</option>
                      @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="card-footer">
                  <a href="{{ route('book.index') }}" class="btn btn-default">Quay lại</a>
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
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
