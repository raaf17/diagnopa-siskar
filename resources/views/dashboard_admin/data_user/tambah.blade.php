@extends('layouts.main')

@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Tambah User Baru</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('datauser.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama User</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex mt-3">
            <button class="btn btn-secondary mr-2"><a href="/admin/dashboard/datauser" class="text-decoration-none" >Close</a></button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<script>
  const nama = document.querySelector('#nama')
  const slug = document.querySelector('#slug')

  nama.addEventListener('change', function(){
    fetch('/admin/dashboard/slugUser?nama=' + nama.value)
    .then(response=>response.json())
    .then(data=>slug.value = data.slug)
  })
</script>
@endsection