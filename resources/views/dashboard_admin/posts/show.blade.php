@extends('layouts.main')

@section('main-content')
<div class="col-12">
  <article class="article article-style-c">
    <div class="article-header">
      @if ($post->image)  
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="...">
      @else  
        <img src="https://source.unsplash.com/1200x500/?chicken" class="card-img-top" alt="...">
      @endif
    </div>
    <div class="article-details">
      <div class="article-category"><a href="#">Post</a> <div class="bullet"></div> <a href="#">{{ $post->created_at->diffForHumans() }}</a></div>
      <div class="article-title">
        <h1><a href="{{ route('home') }}">{{ $post->judul }}</a></h1>
      </div>
      <p>{!! $post->body !!}</p>
      <div class="article-user">
        <img alt="image" src="{{ asset('templates/assets/img/avatar/avatar-1.png') }}">
        <div class="article-user-details">
          <div class="user-detail-name">
            <a href="">{{ $post->author->nama }}</a>
          </div>
          <div class="text-job">Admin</div>
        </div>
      </div>
      <div class="d-flex br pt-4">
        <form action="{{ route('post.index') }}" method="GET" class="pt-3 mr-2">
          <button type="submit" class="btn btn-secondary">Kembali</button>
        </form>
        <form action="{{ route('post.edit', $post->slug) }}" method="GET" class="pt-3">
          <button type="submit" class="btn btn-primary">Edit Post</button>
        </form>
      </div>
    </div>
  </article>
</div>
@endsection