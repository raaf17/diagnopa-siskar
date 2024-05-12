@extends('layouts.main')

@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4>Edit Post</h4>
        <div>
          <form action="{{ route('post.index') }}" method="GET" class="pt-3 mr-2">
            <button type="submit" class="btn btn-secondary">Kembali</button>
          </form>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('post.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <input type="hidden" name="oldSlug" value="{{ $post->slug }}">
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" value="{{ $post->author->nama }}" readonly>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $post->judul) }}">
              @error('judul')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="summernote-simple @error('body') is-invalid @enderror" id="body" name="body" >{{ old('body', $post->body) }}</textarea>
              @error('body')
                <p class="text-danger .mt-5">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="mt-4 col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
            <div class="col-sm-12 col-md-7">
              <img class="img-preview mb-3 col-sm-3 px-0">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const judul = document.querySelector('#judul')
  const slug = document.querySelector('#slug')

  judul.addEventListener('change', function(){
    fetch('/admin/dashboard/slugPost?judul=' + judul.value)
    .then(response=>response.json())
    .then(data=>slug.value = data.slug)
  })

  function previewImage(){
    const image = document.querySelector('#image')
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display ='block'

    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result
    }
  }
</script>
@endsection