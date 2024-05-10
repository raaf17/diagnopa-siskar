@extends('layouts.main')

@section('main-content')
<section class="section">
  <div class="section-header">
    <h1>DataTables</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Modules</a></div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">DataTables</h2>
    {{-- <p class="section-lead">
      We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
    </p> --}}

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Basic DataTables</h4>
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
                        <a href="#" class="btn btn-info">Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
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