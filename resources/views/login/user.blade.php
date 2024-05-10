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
            @if (session()->has('RegisterSuccess'))
            <div class="alert alert-success alert-dismissible show fade mt-3" style="width: 85%; margin: 10px auto">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ session('RegisterSuccess') }}
              </div>
            </div>
            @endif
            <div class="card-header"><h4>Login as User</h4></div>
            <div class="card-body">
              <form method="POST" action="{{ route('user.auth') }}">
                @csrf
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control" name="username" tabindex="1" autofocus>
                </div>
                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
            </div>
            <h4 style="text-align: center; font-size: 15px;">Not user? <a href="{{ route('admin.login') }}">login as admin</a></h4>
            <h4 style="text-align: center; font-size: 15px; padding-bottom: 15px;">Haven't account <a href="{{ route('user.register') }}">register now!</a></h4>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection