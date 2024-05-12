@extends('layouts.main')

@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Penyakit</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('penyakit.update', $penyakit->slug) }}" method="POST">
          @method("PUT")
          @csrf
          <input type="hidden" name="oldNama" value="{{ $penyakit->nama }}">
          <input type="hidden" name="oldSlug" value="{{ $penyakit->slug }}">
          <div class="form-group">
            <label>Nama penyakit</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $penyakit->nama) }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $penyakit->slug) }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group mb-0">
            <label>Detail penjelasan</label>
            <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" style="height: 120px; resize:none;" >{{ old('detail', $penyakit->detail) }}</textarea>
            @error('detail')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex mt-3">
            <button class="btn btn-secondary mr-2"><a href="/admin/dashboard/penyakit" class="text-decoration-none" >Close</a></button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
    fetch('/admin/dashboard/slugPenyakit?nama=' + nama.value)
    .then(response=>response.json())
    .then(data=>slug.value = data.slug)
  })
</script>
@endsection