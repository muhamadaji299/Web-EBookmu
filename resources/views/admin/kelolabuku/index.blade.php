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
  <h5 class="mb-3">Kelola Data Buku</h5>

  <!-- Search + Tambah Button -->
 <!-- Search + Tambah Button -->
<div class="row mb-2 align-items-center">
  <!-- Search form -->
  <div class="col-md-6 d-flex">
    <form action="{{ route('kelolabuku.index') }}" method="GET" class="d-flex w-100">
      <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Cari data..." style="max-width: 250px;">
      <button class="btn btn-sm btn-primary" type="submit">
        <i class="fas fa-search"></i> Cari
      </button>
    </form>
  </div>

  <!-- Tambah Data -->
  <div class="col-md-6 text-end">
    <a href="{{ route('kelolabuku.create') }}" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i> Tambah Data
    </a>
  </div>
</div>


  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Deskripsi Buku</th>
          <th>Cover</th>
          <th>File</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelolabuku as $index => $buku)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $buku->judul }}</td>
          <td>{{ $buku->deskripsi }}</td>
          <td><img src="{{ asset('storage/'. $buku->cover)}}" width="60"></td>
          <td>{{ $buku->file }}</td>
          <td>
            <a href="{{ route('kelolabuku.edit',$buku->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
            <form action="{{ route('kelolabuku.destroy',$buku->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin Menghapus?')">
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