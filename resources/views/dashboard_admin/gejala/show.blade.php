@extends('layouts.main')
@section('main-content')
  <div class="card">
    <div class="card-header">
      <h4>{{ $gejala->nama }}</h4>
    </div>
    <div class="card-body">
      <p class="mb-2">{{ $gejala->detail }}</p>
      <div class="d-flex br pt-4">
        <form action="{{ route('gejala.index') }}" method="GET" class="pt-3 mr-2">
          <button type="submit" class="btn btn-secondary">Kembali</button>
        </form>
        <form action="{{ route('gejala.edit', $gejala->slug) }}" method="GET" class="pt-3">
          <button type="submit" class="btn btn-primary">Edit Gejala</button>
        </form>
      </div>
    </div>
  </div>
@endsection