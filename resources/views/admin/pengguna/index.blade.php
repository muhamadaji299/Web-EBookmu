@extends('admin.layout')
@section('header')
<nav class="navbar navbar-expand-lg px-4 shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">
          <strong>E-Bookmu</strong>
        </a>
        <span class="ms-auto text-white small">Sistem Informasi Perpustakaan Berbasis Web</span>
      </div>
    </nav>
    @endsection

    @section('content')
    <div class="container-fluid px-4 py-3">
  <h5 class="mb-3">Pengguna E-Bookmu</h5>

  <!-- Search + Tambah Button -->
 <!-- Search + Tambah Button -->
<div class="row mb-2 align-items-center">
  <!-- Search form -->
  <div class="col-md-6 d-flex">
    <form action="{{ route('pengguna.index')}}" method="GET" class="d-flex w-100">
      <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Cari data..." style="max-width: 250px;">
      <button class="btn btn-sm btn-primary" type="submit">
        <i class="fas fa-search"></i> Cari
      </button>
    </form>
  </div>

  <!-- Tambah Data -->
</div>


  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Aksi</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach( $users as $index => $pengguna)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $pengguna->name }}</td>
          <td>{{ $pengguna->email }}</td>
          <td>
            <form action="{{ route('pengguna.destroy',$pengguna->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin Menghapus?')">
              @csrf 
              @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
  @endsection