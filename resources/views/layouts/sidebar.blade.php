{{-- Sidebar --}}
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    {{-- Nama produk --}}
    <div class="sidebar-brand">
      <img src="{{ asset('img/diagnopa_logo.png') }}" alt="" class="navbar-brand sidebar-gone-hide rounded-circle" style="width: 60px;">
      <a href="{{ route('admin.dashboard') }}">Diagnopa</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">PA</a>
    </div>
    @can('admin')    
      <ul class="sidebar-menu">
        {{-- Dashboard --}}
          <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Main Dashboard</a></li>
              </ul>
            </li>
            {{-- Starter --}}
          <li class="menu-header">Master Data</li>
          <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('gejala.index') }}">Data Gejala</a></li>
                <li><a class="nav-link" href="{{ route('penyakit.index') }}">Data Penyakit</a></li>
                <li><a class="nav-link" href="{{ route('datauser.index') }}">Data User</a></li>
              </ul>
            </li>
          <li class="menu-header">Posts</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Posts</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('posts.index') }}">All Posts</a></li>
              <li><a class="nav-link" href="{{ route('posts.create') }}">Create Post</a></li>
            </ul>
          </li>
      </ul>
    @endcan
    @can('users')    
      <ul class="sidebar-menu">
        {{-- Dashboard --}}
          <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('user.dashboard') }}">Main Dashboard</a></li>
              </ul>
            </li>
            {{-- Starter --}}
          <li class="menu-header">Diagnosa</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Diagnosa</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('posts.index') }}">Buat diagnosa</a></li>
              <li><a class="nav-link" href="{{ route('posts.create') }}">Hisory</a></li>
            </ul>
          </li>
      </ul>
    @endcan
  </aside>
</div>