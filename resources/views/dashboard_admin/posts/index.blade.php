@extends('layouts.main')

@section('main-content')
<section class="section">
  <div class="section-header">
    <h1>Data posts</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="/admin/dashboard/post">posts</a></div>
    </div>
  </div>

  <div class="section-body">
    {{-- Alert --}}
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible show fade mt-3 ">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          {{ session('success') }}
        </div>
      </div>
    @endif

    {{-- Data tables untuk data posts --}}
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <form action="{{ route('post.create') }}" method="GET">
              <button type="submit" class="btn btn-primary">Tambah Post Baru</button>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Judul</th>
                    <th>Author</th>
                    <th>Ditambahkan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)    
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $post->judul }}</td>
                      <td>{{ $post->author->nama }}</td>
                      <td>{{ $post->created_at->diffForHumans() }}</td>
                      <td>
                        <a href="{{ route('post.show', $post->slug) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Post Ini?')">Hapus</button>
                      </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection