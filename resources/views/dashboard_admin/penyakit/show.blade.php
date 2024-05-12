@extends('layouts.main')
@section('main-content')
  <div class="card">
    <div class="card-header">
      <h4>{{ $penyakit->nama }}</h4>
    </div>
    <div class="card-body">
      <p class="mb-2">{{ $penyakit->detail }}</p>
      <div class="d-flex br pt-4">
        <form action="{{ route('penyakit.index') }}" method="GET" class="pt-3 mr-2">
          <button type="submit" class="btn btn-secondary">Kembali</button>
        </form>
        <form action="{{ route('penyakit.edit', $penyakit->slug) }}" method="GET" class="pt-3">
          <button type="submit" class="btn btn-primary">Edit Penyakit</button>
        </form>
      </div>
    </div>
  </div>
@endsection