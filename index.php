<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATX E-Library - Sistem Tempahan Bilik Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f5f7f5; color: #2c3e2f; line-height: 1.6; }
        
        /* Natural Color Palette */
        :root {
            --sage: #9caf88;
            --forest: #2d6a4f;
            --moss: #40916c;
            --clay: #d4a373;
            --cream: #fefae0;
            --stone: #e9edc9;
            --bark: #7f4f24;
            --white: #ffffff;
            --grey: #f8f9fa;
        }

        /* Navigation */
        .navbar { background: var(--white); padding: 16px 32px; box-shadow: 0 2px 15px rgba(0,0,0,0.03); }
        .navbar-brand { font-size: 22px; font-weight: 700; color: var(--forest) !important; }
        .navbar-brand i { color: var(--sage); margin-right: 8px; }
        .nav-link { color: #4a5b4e !important; font-weight: 500; margin-left: 24px; transition: all 0.3s; }
        .nav-link:hover { color: var(--forest) !important; }

        /* Hero Section */
        .hero { background: linear-gradient(135deg, var(--cream) 0%, var(--stone) 100%); min-height: 85vh; display: flex; align-items: center; position: relative; overflow: hidden; }
        .hero h1 { font-size: 56px; font-weight: 700; color: var(--forest); line-height: 1.2; margin-bottom: 24px; }
        .hero h1 span { color: var(--clay); }
        .hero p { font-size: 18px; color: #5a6e5f; margin-bottom: 32px; }
        .btn-primary { background: var(--forest); border: none; border-radius: 50px; padding: 12px 32px; font-weight: 500; transition: all 0.3s; }
        .btn-primary:hover { background: var(--moss); transform: translateY(-3px); box-shadow: 0 10px 25px rgba(45,106,79,0.2); }
        .btn-outline { background: transparent; border: 2px solid var(--forest); color: var(--forest); border-radius: 50px; padding: 10px 30px; font-weight: 500; margin-left: 15px; transition: all 0.3s; }
        .btn-outline:hover { background: var(--forest); color: white; transform: translateY(-3px); }
        .hero-stats { display: flex; gap: 40px; margin-top: 50px; }
        .hero-stats .stat .number { font-size: 32px; font-weight: 700; color: var(--forest); }
        .hero-stats .stat .label { font-size: 14px; color: #7a8e7f; }
        .hero-image { position: relative; }
        .hero-image img { border-radius: 30px; box-shadow: 0 30px 50px rgba(0,0,0,0.1); max-width: 100%; }

        /* Features */
        .features { padding: 80px 0; background: var(--white); }
        .section-title { text-align: center; margin-bottom: 50px; }
        .section-title h2 { font-size: 36px; font-weight: 700; color: var(--forest); margin-bottom: 12px; }
        .section-title p { color: #7a8e7f; font-size: 16px; }
        .feature-card { text-align: center; padding: 40px 25px; background: var(--white); border-radius: 24px; transition: all 0.3s; box-shadow: 0 5px 20px rgba(0,0,0,0.02); border: 1px solid var(--stone); height: 100%; }
        .feature-card:hover { transform: translateY(-8px); box-shadow: 0 20px 35px rgba(0,0,0,0.05); border-color: var(--sage); }
        .feature-icon { width: 70px; height: 70px; background: var(--cream); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 28px; color: var(--forest); }
        .feature-card h3 { font-size: 20px; font-weight: 600; margin-bottom: 12px; color: var(--forest); }
        .feature-card p { color: #7a8e7f; font-size: 14px; }

        /* Room Cards */
        .room-types { padding: 80px 0; background: var(--grey); }
        .room-card { background: var(--white); border-radius: 24px; overflow: hidden; transition: all 0.3s; box-shadow: 0 5px 20px rgba(0,0,0,0.02); border: 1px solid var(--stone); height: 100%; }
        .room-card:hover { transform: translateY(-8px); box-shadow: 0 20px 35px rgba(0,0,0,0.08); }
        .room-img { height: 200px; background-size: cover; background-position: center; position: relative; }
        .room-img .overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.6)); padding: 20px; color: white; }
        .room-img .overlay h4 { margin: 0; font-size: 20px; font-weight: 600; }
        .room-body { padding: 20px; }
        .room-info { display: flex; justify-content: space-between; margin-bottom: 12px; color: #7a8e7f; font-size: 13px; }
        .room-info i { width: 20px; color: var(--sage); }
        .btn-sm { background: var(--cream); color: var(--forest); border: none; border-radius: 50px; padding: 10px; width: 100%; font-weight: 500; transition: all 0.3s; }
        .btn-sm:hover { background: var(--forest); color: white; }

        /* CTA Section */
        .cta-section { background: var(--cream); padding: 80px 0; text-align: center; }
        .cta-section h2 { font-size: 36px; font-weight: 700; color: var(--forest); margin-bottom: 16px; }
        .cta-section p { color: #7a8e7f; margin-bottom: 32px; }
        .btn-cta { background: var(--forest); color: white; border: none; border-radius: 50px; padding: 14px 40px; font-weight: 500; transition: all 0.3s; text-decoration: none; display: inline-block; }
        .btn-cta:hover { background: var(--moss); transform: translateY(-3px); }

        /* Footer */
        .footer { background: #2c3e2f; color: #d4e0d6; padding: 60px 0 30px; }
        .footer h4 { color: white; font-size: 18px; margin-bottom: 20px; font-weight: 600; }
        .footer a { color: #b8cec0; text-decoration: none; transition: all 0.3s; }
        .footer a:hover { color: var(--cream); }
        .footer .social-links a { display: inline-block; width: 36px; height: 36px; background: rgba(255,255,255,0.1); border-radius: 50%; text-align: center; line-height: 36px; margin-right: 8px; transition: all 0.3s; }
        .footer .social-links a:hover { background: var(--sage); color: #2c3e2f; }
        .copyright { text-align: center; padding-top: 30px; margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 13px; }

        @media (max-width: 768px) {
            .hero h1 { font-size: 36px; }
            .hero-stats { flex-wrap: wrap; gap: 20px; }
            .section-title h2 { font-size: 28px; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-book-open"></i> ATX E-Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Utama</a></li>
                    <li class="nav-item"><a class="nav-link" href="bilik.php">Bilik</a></li>
                    <li class="nav-item"><a class="nav-link" href="login_ahli.php">Log Masuk</a></li>
                    <li class="nav-item"><a class="nav-link" href="daftar_ahli.php">Daftar</a></li>
                    <li class="nav-item"><a class="nav-link" href="login_admin.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero" style="margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Ruang Belajar <span>Sempurna</span> Untuk Anda</h1>
                    <p>Tempah bilik belajar, studio rakaman, dan ruang perpustakaan secara online dengan mudah dan cepat.</p>
                    <div>
                        <a href="bilik.php" class="btn btn-primary"><i class="fas fa-calendar-plus"></i> Tempah Sekarang</a>
                        <a href="daftar_ahli.php" class="btn-outline"><i class="fas fa-user-plus"></i> Daftar Ahli</a>
                    </div>
                    <?php
                    $total_bilik = $pdo->query("SELECT COUNT(*) FROM bilik")->fetchColumn();
                    $total_ahli = $pdo->query("SELECT COUNT(*) FROM ahli_perpustakaan WHERE status = 'aktif'")->fetchColumn();
                    $total_tempahan = $pdo->query("SELECT COUNT(*) FROM tempahan_bilik WHERE status = 'disahkan'")->fetchColumn();
                    ?>
                    <div class="hero-stats">
                        <div class="stat"><div class="number"><?= $total_bilik ?></div><div class="label">Bilik & Ruang</div></div>
                        <div class="stat"><div class="number"><?= $total_ahli ?></div><div class="label">Ahli Aktif</div></div>
                        <div class="stat"><div class="number"><?= $total_tempahan ?></div><div class="label">Ditempah</div></div>
                    </div>
                </div>
                <div class="col-lg-6 hero-image text-center">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Library" class="img-fluid" style="border-radius: 30px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Kemudahan Kami</h2>
                <p>Pelbagai kemudahan disediakan untuk keselesaan anda</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4"><div class="feature-card"><div class="feature-icon"><i class="fas fa-chalkboard-user"></i></div><h3>Bilik Belajar</h3><p>Kapasiti 20 orang dengan kemudahan lengkap</p></div></div>
                <div class="col-lg-3 col-md-6 mb-4"><div class="feature-card"><div class="feature-icon"><i class="fas fa-microphone-alt"></i></div><h3>Studio Rakaman</h3><p>Peralatan audio profesional</p></div></div>
                <div class="col-lg-3 col-md-6 mb-4"><div class="feature-card"><div class="feature-icon"><i class="fas fa-wifi"></i></div><h3>WiFi Percuma</h3><p>Akses internet kelajuan tinggi</p></div></div>
                <div class="col-lg-3 col-md-6 mb-4"><div class="feature-card"><div class="feature-icon"><i class="fas fa-headset"></i></div><h3>Sokongan 24/7</h3><p>Pasukan bersedia membantu</p></div></div>
            </div>
        </div>
    </section>

    <section class="room-types">
        <div class="container">
            <div class="section-title">
                <h2>Jenis Bilik & Ruang</h2>
                <p>Pilih mengikut keperluan anda</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4"><div class="room-card"><div class="room-img" style="background-image: url('https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"><div class="overlay"><h4>Bilik Belajar</h4></div></div><div class="room-body"><div class="room-info"><span><i class="fas fa-users"></i> 4-8 orang</span><span><i class="fas fa-tv"></i> Projektor</span></div><a href="bilik.php?jenis=1" class="btn-sm">Lihat Bilik →</a></div></div></div>
                <div class="col-lg-4 col-md-6 mb-4"><div class="room-card"><div class="room-img" style="background-image: url('https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"><div class="overlay"><h4>Studio Rakaman</h4></div></div><div class="room-body"><div class="room-info"><span><i class="fas fa-users"></i> 3-4 orang</span><span><i class="fas fa-microphone"></i> Audio Pro</span></div><a href="bilik.php?jenis=2" class="btn-sm">Lihat Studio →</a></div></div></div>
                <div class="col-lg-4 col-md-6 mb-4"><div class="room-card"><div class="room-img" style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"><div class="overlay"><h4>Ruang Perpustakaan</h4></div></div><div class="room-body"><div class="room-info"><span><i class="fas fa-users"></i> 30-50 orang</span><span><i class="fas fa-book"></i> Koleksi Lengkap</span></div><a href="bilik.php?jenis=3" class="btn-sm">Lihat Ruang →</a></div></div></div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>Sedia untuk Tempah Bilik?</h2>
            <p>Daftar sekarang dan nikmati kemudahan terbaik kami</p>
            <a href="daftar_ahli.php" class="btn-cta"><i class="fas fa-user-plus"></i> Daftar Sekarang</a>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4"><h4><i class="fas fa-book-open"></i> ATX E-Library</h4><p>Sistem tempahan bilik belajar dan ruang perpustakaan digital.</p><div class="social-links"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a></div></div>
                <div class="col-lg-2 col-md-6 mb-4"><h4>Pautan</h4><ul class="list-unstyled"><li><a href="index.php">Utama</a></li><li><a href="bilik.php">Bilik</a></li><li><a href="daftar_ahli.php">Daftar</a></li><li><a href="login_ahli.php">Log Masuk</a></li></ul></div>
                <div class="col-lg-3 col-md-6 mb-4"><h4>Hubungi</h4><ul class="list-unstyled"><li><i class="fas fa-map-marker-alt"></i> Kolej ATX</li><li><i class="fas fa-phone"></i> +603-555 0000</li><li><i class="fas fa-envelope"></i> info@atxelibrary.edu.my</li></ul></div>
                <div class="col-lg-3 mb-4"><h4>Waktu Operasi</h4><ul class="list-unstyled"><li>Ahad - Khams: 8:00 AM - 4:00 PM</li>
            </div>
            <div class="copyright"><p>&copy; 2026 ATX E-Library. Hak Cipta Terpelihara.</p></div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>