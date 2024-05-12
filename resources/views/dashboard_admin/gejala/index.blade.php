@extends('layouts.main')

@section('main-content')
<section class="section">
  <div class="section-header">
    <h1>Data Gejala</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="/admin/dashboard/gejala">Gejala</a></div>
    </div>
  </div>
  <div class="section-body">
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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <form action="{{ route('gejala.create') }}" method="GET">
              <button type="submit" class="btn btn-primary">Tambah Gejala Baru</button>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Nama Gejala</th>
                    <th>Ditambahkan</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($gejala as $gejala)    
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $gejala->nama }}</td>
                      <td>{{ $gejala->created_at }}</td>
                      <td>{{ $gejala->updated_at }}</td>
                      <td>
                        <a href="{{ route('gejala.show', $gejala->slug) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('gejala.edit', $gejala->slug) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('gejala.destroy', $gejala->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Siswa Ini?')">Hapus</button>
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