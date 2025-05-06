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
  <h5 class="mb-3">Form Edit Ebook</h5>

  <!-- Search + Tambah Button -->
  <div class="row mb-2 align-items-center">
    <!-- Search form -->
    <form action="{{ route('kelolabuku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="judul" class="form-label">Judul Buku</label>
    <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}">
  </div>

  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi Buku</label>
    <textarea name="deskripsi" class="form-control" rows="4">{{ $buku->deskripsi }}</textarea>
  </div>

  <div class="mb-3">
    <label for="cover" class="form-label">Cover Buku</label>
    <input type="file" name="cover" class="form-control">
    @if($buku->cover)
      <img src="{{ asset('storage/' . $buku->cover) }}" width="60" class="mt-2">
    @endif
  </div>

  <div class="mb-3">
    <label for="file" class="form-label">File PDF</label>
    <input type="file" name="file" class="form-control" accept=".pdf">
    @if($buku->file)
      <small>File saat ini: <a href="{{ asset('storage/' . $buku->file) }}" target="_blank">Lihat PDF</a></small>
    @endif
  </div>

  <button type="submit" class="btn btn-primary">Update Ebook</button>
  
  <a href="{{ route('kelolabuku.index') }}" class="btn btn-secondary">Kembali</a>
</form>
  </div>
  @endsection