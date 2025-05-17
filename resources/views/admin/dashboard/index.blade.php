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
    <h2 class="section-title">Dashboard Administrator</h2>

    <div class="container-fluid px-4">
      <div class="row g-4">
        <!-- Buku -->
        <div class="col-md-6 col-xl-3">
          <div class="dashboard-card card-blue">
            <div>
              <h1 class="display-5">{{ $jumlahbuku }}</h1>
              <h5>Buku</h5>
              <a href="kelolabuku"class="more-info text-decoration-none">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="card-icon"><i class="fas fa-book"></i></div>
          </div>
        </div>
        <!-- Anggota -->
        <div class="col-md-6 col-xl-3">
          <div class="dashboard-card card-orange">
            <div>
              <h1 class="display-5">{{ $jumlahpengguna }}</h1>
              <h5>Pengguna</h5>
              <a href="pengguna" class="more-info text-decoration-none">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="card-icon"><i class="fas fa-users"></i></div>
          </div>
        </div>
        <!-- Sirkulasi -->
        <div class="col-md-6 col-xl-3">
          <div class="dashboard-card card-green">
            <div>
              <h1 class="display-5">{{ $totaldibaca }}</h1>
              <h5>Buku Yg Telah Dibaca</h5>
              <a href="bukularis" class="more-info text-decoration-none">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="card-icon"><i class="fas fa-sync"></i></div>
          </div>
    </div>
  </div>
  @endsection