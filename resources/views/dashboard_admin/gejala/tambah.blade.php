@extends('layouts.main')

@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Tambah Gejala Baru</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('gejala.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama gejala</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group mb-0">
            <label>Detail penjelasan</label>
            <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" style="height: 120px; resize:none;" >{{ old('detail') }}</textarea>
            @error('detail')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex mt-3">
            <button class="btn btn-secondary mr-2"><a href="/admin/dashboard/gejala" class="text-decoration-none" >Kembali</a></button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Untuk auto create slug --}}
<script>
  const nama = document.querySelector('#nama')
  const slug = document.querySelector('#slug')

  nama.addEventListener('change', function(){
    fetch('/admin/dashboard/slugGejala?nama=' + nama.value)
    .then(response=>response.json())
    .then(data=>slug.value = data.slug)
  })
</script>
@endsection