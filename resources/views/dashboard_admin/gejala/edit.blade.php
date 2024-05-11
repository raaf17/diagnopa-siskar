@extends('layouts.main')

@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit gejala</h4>
      </div>
      <div class="card-body">
        {{-- <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
          <div class="col-sm-12 col-md-7">
            <select class="form-control selectric">
              <option>Tech</option>
              <option>News</option>
              <option>Political</option>
            </select>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
          <div class="col-sm-12 col-md-7">
            <textarea class="summernote-simple"></textarea>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary">Publish</button>
          </div>
        </div> --}}
        <form action="{{ route('gejala.update', $gejala->slug) }}" method="POST">
          @method("PUT")
          @csrf
          <input type="hidden" name="oldNama" value="{{ $gejala->nama }}">
          <input type="hidden" name="oldSlug" value="{{ $gejala->slug }}">
          <div class="form-group">
            <label>Nama gejala</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $gejala->nama) }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $gejala->slug) }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group mb-0">
            <label>Detail penjelasan</label>
            <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" style="height: 120px; resize:none;" >{{ old('detail', $gejala->detail) }}</textarea>
            @error('detail')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="d-flex mt-3">
            <button class="btn btn-secondary mr-2"><a href="/admin/dashboard/gejala" class="text-decoration-none" >Close</a></button>
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
    fetch('/admin/dashboard/slugGejala?nama=' + nama.value)
    .then(response=>response.json())
    .then(data=>slug.value = data.slug)
  })
</script>
@endsection