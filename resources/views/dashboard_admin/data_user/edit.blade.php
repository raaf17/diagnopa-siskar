@extends('layouts.main')

@section('main-content')
<div class="col-md-12 col-sm-12">
  <div class="card">
    <div class="card-header">
      <h4> Edit Profile User</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('datauser.update', $user->username) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Nama User</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $user->nama) }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}">
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Ditambahkan</label>
            <input type="text" class="form-control" value="{{ $user->created_at }}" readonly>
          </div>
        </div>
        <div class="d-flex br">
          <a href="/admin/dashboard/datauser" class="btn btn-secondary mr-2">Kembali</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection