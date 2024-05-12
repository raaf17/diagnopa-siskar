@extends('layouts.main')

@section('main-content')
<div class="col-md-12 col-sm-12">
  <div class="card">
    
      <div class="card-header">
        <h4>Profile User</h4>
      </div>
      <div class="card-body">
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Nama User</label>
              <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
            </div>
            <div class="form-group col-md-6 col-12">
              <label>Username</label>
              <input type="text" class="form-control" value="{{ $user->username }}" readonly>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Email</label>
              <input type="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group col-md-6 col-12">
              <label>Ditambahkan</label>
              <input type="email" class="form-control" value="{{ $user->created_at }}" readonly>
            </div>
          </div>
          <div class="d-flex br">
            <form action="{{ route('datauser.index') }}" method="GET" class="pt-3 mr-2">
              <button type="submit" class="btn btn-secondary">Kembali</button>
            </form>
            <form action="{{ route('datauser.edit', $user->username) }}" method="GET" class="pt-3">
              <button type="submit" class="btn btn-primary">Edit Datauser</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection