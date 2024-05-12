@extends('layouts.main')

@section('main-content')
<section class="section">
  <div class="section-header">
    <h1>Data Penyakit</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="/admin/dashboard/penyakit">Penyakit</a></div>
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
            {{-- <h4>Basic DataTables</h4> --}}
            <form action="{{ route('penyakit.create') }}" method="GET">
              <button type="submit" class="btn btn-primary">Tambah Penyakit Baru</button>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Nama Penyakit</th>
                    <th>Ditambahkan</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($penyakit as $penyakit)    
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $penyakit->nama }}</td>
                      <td>{{ $penyakit->created_at }}</td>
                      <td>{{ $penyakit->updated_at }}</td>
                      <td>
                        <a href="{{ route('penyakit.show', $penyakit->slug) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('penyakit.edit', $penyakit->slug) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('penyakit.destroy', $penyakit->id) }}" method="POST" class="d-inline">
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