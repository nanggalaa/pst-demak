<!DOCTYPE html>
<html>
<head>
    <title>Tentang - Portal Pelayanan Statistik Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .custom-navbar {
            background: #d1d7f9;
            border-radius: 50px;
            padding: 6px 24px;
            max-width: 1100px;
            margin: 30px auto;
            color: black;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .custom-navbar .nav-link,
        .custom-navbar .navbar-brand,
        .custom-navbar .text-muted {
        color: black !important;
        }

        .custom-navbar .btn-danger {
            background-color: #e53935;
            border: none;
        }
        body {
            font-family: Arial, sans-serif;
            background-image: 
                linear-gradient(to bottom, rgba(0, 32, 96, 0.85), rgba(255, 204, 51, 0.85)),
                url('{{ asset('gedungbps.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            padding: 30px;
            min-height: 100vh;
        }

        .welcome-text {
            color: #fff;
            text-align: center;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.6);
        }

        .welcome-title {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.4;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.6);       
        }

        /* Bagian card putih */
        .card-container {
            margin-top: 50px;
            margin-bottom: 50px;
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .content-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .footer-custom {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            max-width: 1100px;
            margin: 0 auto;
        }

        img {
            width: 250px;
            height: auto;
            margin-bottom: 10px;
        }
        
        .about-header {
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .contact-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }
        
        .contact-icon {
            font-size: 24px;
            color: #0d6efd;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm custom-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Kiri: Logo dan Teks -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('bps.png') }}" alt="Logo" height="36" class="me-3">
            
            <!-- Pemisah garis vertikal -->
            <div style="border-left: 2px solid #ccc; height: 40px;" class="me-3"></div>

            <div class="d-flex flex-column lh-sm">
                <strong style="font-size: 18px;">Pelayanan Statistik Terpadu</strong>
                <small class="text-muted" style="font-size: 11px;">BPS Kabupaten Demak</small>
            </div>
        </a>

        <!-- Menu Tengah -->

        <!-- Kanan: Tombol Admin & Pegawai -->
        <div class="d-flex gap-2">
            <a class="nav-link" href="/">Beranda</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="about-header">Tentang Portal Pelayanan Statistik Terpadu</h1>
    <h2 class="about-header">BPS Kabupaten Demak</h2>
</div>

<div class="container card-container">
    <!-- Profil BPS -->
    <div class="content-card">
        <h3 class="section-title">Profil BPS Kabupaten Demak</h3>
        <p class="text-justify">
            Badan Pusat Statistik (BPS) Kabupaten Demak merupakan instansi pemerintah yang bertanggung jawab 
            dalam penyediaan data statistik untuk pembangunan di wilayah Kabupaten Demak. Kami menyediakan 
            berbagai layanan statistik terpadu untuk memenuhi kebutuhan data masyarakat, peneliti, instansi 
            pemerintah, dan pelaku usaha.
        </p>
        
        <h5 class="mt-4">Visi dan Misi</h5>
        <p><strong>Misi:</strong></p>
        <p>Menyediakan data statistik berkualitas untuk mendukung pembangunan berkelanjutan di Kabupaten Demak.</p>
        <p><strong>Misi:</strong></p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Menyelenggarakan kegiatan statistik yang akurat dan tepat waktu</li>
            <li class="list-group-item">Mengembangkan sistem informasi statistik yang terintegrasi</li>
            <li class="list-group-item">Meningkatkan kualitas pelayanan data kepada masyarakat</li>
            <li class="list-group-item">Melakukan inovasi dalam metode pengumpulan dan penyajian data</li>
        </ul>
    </div>

    <!-- Layanan Kami -->
    <div class="content-card">
        <h3 class="section-title">Layanan Kami</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill contact-icon"></i>
                        <h5 class="card-title">Layanan Antrian</h5>
                        <p class="card-text">Ambil nomor antrian dan pantau status antrian secara online.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-text contact-icon"></i>
                        <h5 class="card-title">Layanan Buku Tamu</h5>
                        <p class="card-text">Catat kunjungan Anda dengan mudah melalui buku tamu digital.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-star-fill contact-icon"></i>
                        <h5 class="card-title">Evaluasi Pegawai</h5>
                        <p class="card-text">Beri masukan Anda terhadap pelayanan pegawai kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kontak dan Lokasi -->
    <div class="content-card">
        <h3 class="section-title">Kontak dan Lokasi</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info h-100">
                    <h5><i class="bi bi-geo-alt-fill contact-icon"></i> Alamat</h5>
                    <p>Jl. Sultan Hadiwijaya No.23, Krajan, Mangunjiwan<br>Kec. Demak, Kabupaten Demak<br>Jawa Tengah 59515</p>
                    
                    <h5><i class="bi bi-telephone-fill contact-icon"></i> Telepon</h5>
                    <p>(0291) 685445</p>
                    
                    <h5><i class="bi bi-printer-fill contact-icon"></i> Fax</h5>
                    <p>(0291) 681754</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info h-100">
                    <h5><i class="bi bi-envelope-fill contact-icon"></i> Email</h5>
                    <p>bps3321@bps.go.id</p>
                    
                    <h5><i class="bi bi-clock-fill contact-icon"></i> Jam Operasional</h5>
                    <p>Senin - Kamis: 08.00 - 16.00 WIB<br>Jumat: 08.00 - 16.30 WIB</p>
                    
                    <h5><i class="bi bi-globe contact-icon"></i> Website</h5>
                    <p>https://demakkab.bps.go.id</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-custom mt-5">
    <div class="container">
        <div class="row text-start">
            <div class="col-md-4 mb-3">
                <img src="{{ asset('bps.png') }}" alt="Logo BPS" width="120" class="mb-2">
                <p class="text-muted small">
                    Jl. Sultan Hadiwijaya No.23, Krajan, Mangunjiwan, Kec. Demak, Kabupaten Demak, Jawa Tengah 59515<br>
                    Telp. (0291) 685445, Fax (0291) 681754<br>
                    Email : bps3321@bps.go.id
                </p>
            </div>
            <div class="col-md-2 mb-3">
                <h6 class="fw-bold">Tentang BPS</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-muted">Informasi Umum</a></li>
                    <li><a href="#" class="text-muted">Visi & Misi</a></li>
                    <li><a href="#" class="text-muted">Tugas & Fungsi</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-3">
                <h6 class="fw-bold">Tentang PST</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-muted">Pelayanan Statistik Terpadu</a></li>
                    <li><a href="#" class="text-muted">Standar Pelayanan</a></li>
                    <li><a href="#" class="text-muted">Maklumat Pelayanan</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-3">
                <h6 class="fw-bold">Bantuan</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-muted">Survei Kepuasan</a></li>
                    <li><a href="#" class="text-muted">Pengaduan</a></li>
                    <li><a href="#" class="text-muted">Informasi Pelayanan</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center text-muted small mt-4">
            Semua Hak Dilindungi © 2025, BPS Kabupaten Demak.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>