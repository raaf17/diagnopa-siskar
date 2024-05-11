@extends('layouts_home.main')

@section('main-content')
<div id="app">
  <div class="main-wrapper container">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">

      {{-- Nama website --}}
      <img src="{{ asset('img/diagnopa_logo.png') }}" alt="pa" class="navbar-brand sidebar-gone-hide rounded-circle" style="width: 40px;">
      <a href="{{ route('home') }}" class="navbar-brand sidebar-gone-hide">Diagnopa</a>

      {{-- Navigasi topbar --}}
      <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
          <i class="fas fa-bars"></i> 
        </a>
        <ul class="navbar-nav">
          <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Buat Diagnosa</a></li>
        </ul>
      </div>

      {{-- Search form --}}
      <form class="form-inline ml-auto">
        <ul class="navbar-nav">
          <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          <div class="search-backdrop"></div>
        </div>
      </form>

      {{-- Authentikasi admin & user --}}
      <ul class="navbar-nav navbar-right">
        @guest('admin')
          @guest('users')
              <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-use ml-4"><i class="far fa-user"></i> <span></span><div class="d-sm-none d-lg-inline-block">Login</div></a>
                  <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-title">Who you are?</div>
                      <a href="{{ route('admin.login') }}" class="dropdown-item has-icon">
                          <i class="fas fa-bolt"></i> Admin
                      </a>
                      <a href="{{ route('user.login') }}" class="dropdown-item has-icon">
                          <i class="fas fa-user"></i> User
                      </a>
                      <a href="{{ route('user.register') }}" class="dropdown-item has-icon">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Register
                      </a>
                  </div>
              </li>
          @endguest
        @endguest

        @auth('admin')
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hallo, {{ auth('admin')->user()->nama }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Mau ke mana?</div>
              <a href="{{ route('admin.dashboard') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Dashboard
              </a>
              <div class="dropdown-divider"></div>
              <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                  <button type="submit" class="dropdown-item has-icon text-danger"  style="display: flex; align-items: center;">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                  </button>
              </form>
            </div>
          </li>
        @endauth

        @auth('users')
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hallo, {{ auth('users')->user()->nama }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Mau ke mana?</div>
              <a href="{{ route('user.dashboard') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Dashboard
              </a>
              <div class="dropdown-divider"></div>
              <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                  <button type="submit" class="dropdown-item has-icon text-danger"  style="display: flex; align-items: center;">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                  </button>
              </form>
            </div>
          </li>
        @endauth
      </ul>
    </nav>

    {{-- Posts - Main content --}}
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Berita terkini</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href{{ route('home') }}">Home</a></div>
          </div>
        </div>
   
        <div class="section-body">
          <div class="row">             
            @foreach ($posts as $post)
            <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ $post->title }}</h4>
                </div>
                <div class="card-header">
                  <img src="https://source.unsplash.com/1200x500/?chicken" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="#" class="card-link">Read more</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>

    {{-- Footer --}}
    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2024 <div class="bullet"></div> Created By Kita Bersama, Hehe
      </div>
    </footer>
  </div>
</div>
@endsection