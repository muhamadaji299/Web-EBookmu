<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar E-Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan di bagian head -->
    <link rel="stylesheet" href="{{ url('css/user.css')}}">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <h3 class="text-info">E-Bookmu</h3>
            </a>

            <!-- Menu tengah -->
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#produk">Ebook</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#komen">Komentar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Tombol kanan -->
            <div class="d-flex">
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-info text-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Kiri: Teks dan tombol -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <h1 class="display-4 fw-bold">
                        <i class="bi bi-book" style="color: #00cfff;"></i> Welcome
                    </h1>
                    <p class="lead">
                        Selamat datang di website E-Bookmu. Temukan berbagai bacaan menarik dan edukatif di sini.
                    </p>
                    <a href="#produk" class="btn btn-outline-info btn-lg custom-hover">Lihat Koleksi</a>
                </div>

                <!-- Kanan: Gambar -->
                <div class="col-md-6 text-center">
                    <img src="img/orang.png"
                        alt="Books"
                        class="img-fluid"
                        style="max-height: 350px; margin-right: 20px;">
                </div>
            </div>
        </div>
    </section>
    <section class="py-4 bg-info" id="about">
        <div class="container">
            <div class="row g-4 align-items-center">
                <!-- Gambar kiri -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="img/kami.jpg" alt="About Image" class="img-fluid rounded w-100"
                        style="max-height: 400px; object-fit: cover;">
                </div>

                <!-- Teks kanan -->
                <div class="col-md-6">
                    <h2 class="fw-bold text-light">Tentang Kami</h2>
                    <p class="text-light">
                        E-Bookmu adalah platform e-book modern yang hadir untuk mendukung budaya literasi digital di Indonesia.
                        Kami menyediakan koleksi buku elektronik.
                        Dengan antarmuka yang user-friendly, kamu bisa membaca kapan saja dan di mana saja—langsung dari perangkatmu.
                        <br><br>
                        Misi kami adalah menjadikan membaca lebih mudah diakses oleh siapa saja, serta menciptakan pengalaman membaca yang menyenangkan dan inspiratif.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <!-- Ikon Total E-Book -->
                <div class="col-md-4 mb-4">
                    <div class="icon-box">
                        <i class="fas fa-book fa-3x text-primary"></i>
                        <h3 class="mt-3">{{ $buku }} E-Book</h3>
                        <p>Jumlah e-book yang tersedia di platform kami</p>
                    </div>
                </div>

                <!-- Ikon Jumlah Pengguna -->
                <div class="col-md-4 mb-4">
                    <div class="icon-box">
                        <i class="fas fa-users fa-3x text-success"></i>
                        <h3 class="mt-3"> {{ $userCount }} Pengguna</h3>
                        <p>aktif di platform kami</p>
                    </div>
                </div>

                <!-- Ikon Kepercayaan -->
                <div class="col-md-4 mb-4">
                    <div class="icon-box">
                        <i class="fas fa-thumbs-up fa-3x text-warning"></i>
                        <h3 class="mt-3">Kepercayaan 100%</h3>
                        <p>Rating tinggi dan ulasan positif dari pengguna</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-info" id="produk">
        <div class="container">
            <!-- Search Bar -->
            <form action="{{ route('user.index') }}" method="GET">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari e-book..." aria-label="Search" value="{{ request()->input('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Card E-Book -->
            <div class="row g-4">
                @foreach($kelolabuku as $buku)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/'. $buku->cover )}}" class="e-book-img" alt="Ebook 1" style="height: 290px;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $buku->judul }}</h5>
                            <p class="card-text">{{ $buku->deskripsi }}</p>

                            <!-- Rating -->
                            <div class="mb-2">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="mt-auto d-flex justify-content-between">
                                <!-- Tombol Baca mengarah ke file PDF -->
                                <a href="{{ route('user.baca', $buku->id) }}" class="btn btn-info text-light" target="_blank">Baca</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {{ $kelolabuku->links('pagination::bootstrap-5') }}
                </div>


            </div>
        </div>
    </section>

    <section class="py-5 bg-light" id="komen">
        <div class="container">
            <h2 class="text-center mb-4">Apa Kata Mereka?</h2>
            <div class="position-relative">
                <!-- Tombol Kiri -->
                <button class="btn btn-outline-dark position-absolute top-50 start-0 translate-middle-y z-1"
                    id="prevComment">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <!-- Scrollable Area -->
                <div class="d-flex overflow-hidden" id="commentContainer">
                    <div class="d-flex transition" style="gap: 1rem; min-width: max-content;">
                        <!-- Komentar Card 1 -->
                        <div class="card shadow-sm" style="width: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">🌟🌟🌟🌟⭐</h5>
                                <p class="card-text">"Website ini sangat membantu saya dalam mencari buku favorit!"</p>
                                <p class="text-muted small">- Ahmad R.</p>
                            </div>
                        </div>
                        <!-- Komentar Card 2 -->
                        <div class="card shadow-sm" style="width: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">🌟🌟🌟🌟🌟</h5>
                                <p class="card-text">"Desain simpel dan koleksinya lengkap banget!"</p>
                                <p class="text-muted small">- Siti N.</p>
                            </div>
                        </div>
                        <!-- Komentar Card 3 -->
                        <div class="card shadow-sm" style="width: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">🌟🌟🌟🌟⭐</h5>
                                <p class="card-text">"Saya suka fitur dan tampilannya yang mudah digunakan."</p>
                                <p class="text-muted small">- Budi S.</p>
                            </div>
                        </div>
                        <!-- Komentar Card 4 -->
                        <div class="card shadow-sm" style="width: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">🌟🌟🌟🌟🌟</h5>
                                <p class="card-text">"Sangat cocok untuk mahasiswa yang cari referensi digital."</p>
                                <p class="text-muted small">- Lina M.</p>
                            </div>
                        </div>
                        <!-- Komentar Card 5 -->
                        <div class="card shadow-sm" style="width: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">🌟🌟🌟🌟⭐</h5>
                                <p class="card-text">"Banyak buku gratis dan enak di pakai website nyah"</p>
                                <p class="text-muted small">- Yanto T.</p>
                            </div>
                        </div>
                        <!-- Komentar Card 6 -->
                        <div class="card shadow-sm" style="width: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">🌟🌟🌟🌟🌟</h5>
                                <p class="card-text">"Web-nya ringan, cocok buat dibuka di HP juga."</p>
                                <p class="text-muted small">- Nisa A.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tombol Kanan -->
                <button class="btn btn-outline-dark position-absolute top-50 end-0 translate-middle-y z-1"
                    id="nextComment">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5" style="background-color: #f5faff;">
        <div class="container">
            <h2 class="text-center mb-5 text-dark">Hubungi Kami</h2>
            <div class="row">
                <!-- Kontak Info -->
                <div class="col-md-6 mb-4">
                    <div class="p-4 bg-white shadow rounded-3">
                        <h5 class="mb-3">Informasi Kontak</h5>
                        <p><i class="fas fa-envelope me-2 text-info"></i>info@ebookmu.com</p>
                        <p><i class="fas fa-phone me-2 text-info"></i>+62 857-1645-1180</p>
                        <p><i class="fas fa-map-marker-alt me-2 text-info"></i>Jl. Literasi No. 1, Bogor</p>
                        <h6 class="mt-4">Ikuti Kami:</h6>
                        <a href="#" class="me-2 text-info text-info"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="me-2 text-info text-info"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-info text-info"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
                <!-- Form -->
                <div class="col-md-6">
                    <div class="p-4 bg-white shadow rounded-3">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap kamu" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="email@kamu.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea name="pesan" class="form-control" id="pesan" rows="4" placeholder="Tulis pesanmu di sini..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-info text-light w-100">Kirim Pesan</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-info text-light py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; 2025 <strong>eBookmu</strong>. All rights reserved.</p>
            <small>Made with <span style="color: #ff6b6b;">❤️</span> by Tim eBookmu</small>
        </div>
    </footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    const commentContainer = document.getElementById('commentContainer');
    const nextButton = document.getElementById('nextComment');
    const prevButton = document.getElementById('prevComment');

    const scrollAmount = 320; // Scroll per klik

    nextButton.addEventListener('click', () => {
        commentContainer.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });

    prevButton.addEventListener('click', () => {
        commentContainer.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });
</script>


</html>