<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item {{ classActivePath('dashboard') }}">
          <a href="{{ route('dashboard') }}" class="nav-link {{ classActiveSegment('dashboard') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>Dashboard
          </a>
        </li>

        <li class="nav-header">Management</li>

        <li class="nav-item {{ classActivePath(['reader.index', 'reader.edit', 'reader.create']) }}">
          <a href="{{ route('reader.index') }}" class="nav-link {{ classActiveSegment('reader.index') }}">
            <i class="nav-icon far fa-user"></i>Reader
          </a>
        </li>

        <li class="nav-item {{ classActivePath(['book.index', 'book.edit', 'book.create']) }}">
          <a href="{{ route('book.index') }}" class="nav-link {{ classActiveSegment('book.index') }}">
            <i class="nav-icon fa fa-book"></i>Book
          </a>
        </li>

        <li class="nav-item {{ classActivePath('borrow.index') }}">
          <a href="{{ route('borrow.index') }}" class="nav-link {{ classActiveSegment('borrow.index') }}">
            <i class="nav-icon far fa-id-card"></i>Borrow
          </a>
        </li>

        <li class="nav-item {{ classActivePath('borrow.overdue') }}">
          <a href="{{ route('borrow.overdue') }}" class="nav-link {{ classActiveSegment('borrow.overdue') }}">
            <i class="nav-icon far fa-id-card"></i>Borrow overdue
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
