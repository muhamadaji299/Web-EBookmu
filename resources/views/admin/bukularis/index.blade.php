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
  <h5 class="mb-3">Jumlah Pembaca Buku di E-Bookmu</h5>

  <!-- Search + Tambah Button -->
 <!-- Search + Tambah Button -->
<div class="row mb-2 align-items-center">
  <!-- Search form -->
  <div class="col-md-6 d-flex">
  </div>

  <!-- Tambah Data -->
</div>


  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>judul</th>
          <th>Jumlah dibaca</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach( $bukuTerbaca as $index => $buku)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $buku->judul }}</td>
          <td>{{ $buku->dibaca }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
  @endsection