@extends('login.main')

@section('main-content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="card card-primary">
            @if (session()->has('loginFailed'))
            <div class="alert alert-danger alert-dismissible show fade mt-3" style="width: 85%; margin: 10px auto">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ session('loginFailed') }}
              </div>
            </div>
            @endif
            <div class="card-header"><h4>Fill your data</h4></div>
            <div class="card-body">
              <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" tabindex="1" autofocus value="{{ old('nama') }}">
                  @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1" autofocus value="{{ old('username') }}">
                  @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" autofocus value="{{ old('email') }}">
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2">
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection