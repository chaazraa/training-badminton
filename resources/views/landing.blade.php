<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alviza Badminton Academy | Pelatihan Profesional</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
  :root {
    --primary: #2563eb;         /* Vibrant blue */
    --primary-light: #3b82f6;   /* Lighter blue */
    --secondary: #f59e0b;       /* Amber accent */
    --accent: #10b981;          /* Emerald green */
    --dark: #1e293b;            /* Dark blue-gray */
    --darker: #0f172a;          /* Darker blue-gray */
    --light: #f8fafc;           /* Lightest gray */
    --lighter: #f1f5f9;         /* Lighter gray */
    --text: #1e293b;            /* Primary text */
    --text-light: #64748b;      /* Secondary text */
    --border: #e2e8f0;          /* Border color */
    
    /* Gradients */
    --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    --gradient-secondary: linear-gradient(135deg, var(--secondary) 0%, #f97316 100%);
    
    /* Shadows */
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
    --shadow-xl: 0 20px 40px rgba(0,0,0,0.15);
    --shadow-primary: 0 10px 25px rgba(37, 99, 235, 0.3);
    
    /* Transitions */
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Base Styles */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Poppins', sans-serif;
    color: var(--text);
    line-height: 1.6;
    background-color: var(--light);
    overflow-x: hidden;
    animation: fadeIn 0.8s ease-out forwards;
    opacity: 0;
  }

  h1, h2, h3, h4 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 800;
    line-height: 1.2;
  }

  a {
    text-decoration: none;
    color: inherit;
    transition: var(--transition);
  }

  img {
    max-width: 100%;
    height: auto;
    display: block;
  }

  .container {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 32px;
  }

  .section {
    padding: 120px 0;
    position: relative;
  }

  .section-title {
    text-align: center;
    margin-bottom: 80px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }

  .section-title h2 {
    font-size: 3rem;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
  }

  .section-title h2:after {
    content: '';
    position: absolute;
    width: 100px;
    height: 6px;
    background: var(--gradient-secondary);
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 3px;
  }

  .section-title p {
    font-size: 1.2rem;
    color: var(--text-light);
    line-height: 1.8;
  }

  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 16px 32px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: var(--transition);
    cursor: pointer;
    border: none;
    text-align: center;
    position: relative;
    overflow: hidden;
  }

  .btn-primary {
    background: var(--gradient-primary);
    color: white;
    box-shadow: var(--shadow-primary);
  }

  .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(37, 99, 235, 0.4);
  }

  .btn-secondary {
    background: white;
    color: var(--primary);
    border: 2px solid var(--primary);
  }

  .btn-secondary:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
  }

  .btn-icon {
    margin-left: 10px;
    transition: transform 0.3s ease;
  }

  .btn:hover .btn-icon {
    transform: translateX(5px);
  }

  /* Header */
  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: rgba(15, 23, 42, 0.98);
    backdrop-filter: blur(8px);
    padding: 20px 0;
    transition: var(--transition);
    border-bottom: 1px solid rgba(255,255,255,0.1);
  }

  .header.scrolled {
    padding: 15px 0;
    box-shadow: var(--shadow-xl);
  }

  .header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.8rem;
    font-weight: 800;
    color: white;
  }

  .logo-icon {
    color: var(--secondary);
    font-size: 1.8rem;
  }

  .nav-links {
    display: flex;
    gap: 30px;
  }

  .nav-links a {
    color: white;
    font-weight: 500;
    font-size: 1.05rem;
    position: relative;
    padding: 5px 0;
  }

  .nav-links a:after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background: var(--secondary);
    bottom: 0;
    left: 0;
    transition: var(--transition);
  }

  .nav-links a:hover:after {
    width: 100%;
  }

  .mobile-menu-btn {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
  }

  /* Hero Section */
  .hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 140px 0 80px;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 41, 59, 0.95) 100%),
                url('https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
  }

  .hero:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 20% 50%, rgba(37, 99, 235, 0.15) 0%, transparent 50%);
    animation: pulse 8s infinite alternate;
  }

  .hero-content {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 2;
    color: white;
  }

  .hero h1 {
    font-size: 4rem;
    margin-bottom: 25px;
    background: linear-gradient(to right, white, #e2e8f0);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    line-height: 1.15;
  }

  .hero p {
    font-size: 1.4rem;
    margin-bottom: 40px;
    opacity: 0.9;
    font-weight: 300;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
  }

  .btn-group {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 30px;
  }

  /* Features Section */
  .features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin-top: 50px;
  }

  .feature-card {
    background: white;
    border-radius: 16px;
    padding: 50px 40px;
    box-shadow: var(--shadow-lg);
    transition: var(--transition-slow);
    text-align: center;
    position: relative;
    overflow: hidden;
    border: 1px solid var(--border);
  }

  .feature-card:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--gradient-primary);
  }

  .feature-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
  }

  .feature-icon {
    width: 100px;
    height: 100px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    color: white;
    font-size: 2.8rem;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
  }

  .feature-card:hover .feature-icon {
    transform: rotate(15deg) scale(1.1);
    box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
  }

  .feature-card h3 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: var(--dark);
  }

  .feature-card p {
    color: var(--text-light);
    font-size: 1.1rem;
    line-height: 1.7;
  }

  /* Stats Section */
  .stats-section {
    background: var(--darker);
    color: white;
    padding: 100px 0;
    position: relative;
  }

  .stats-section:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.02)" d="M0,0 L100,0 L100,100 L0,100 Z"></path></svg>');
    background-size: 30px 30px;
    opacity: 0.2;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px;
    text-align: center;
  }

  .stat-item {
    position: relative;
    z-index: 2;
  }

  .stat-number {
    font-size: 4.5rem;
    font-weight: 800;
    color: var(--secondary);
    margin-bottom: 10px;
    line-height: 1;
  }

  .stat-label {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.8);
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  /* Testimonials */
  .testimonials {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 60px;
  }

  .testimonial-card {
    background: white;
    border-radius: 16px;
    padding: 40px;
    box-shadow: var(--shadow-lg);
    position: relative;
    border: 1px solid var(--border);
  }

  .testimonial-card:before {
    content: '"';
    position: absolute;
    top: 20px;
    left: 20px;
    font-family: serif;
    font-size: 5rem;
    color: rgba(37, 99, 235, 0.1);
    line-height: 1;
    z-index: 0;
  }

  .testimonial-content {
    font-size: 1.1rem;
    color: var(--text);
    margin-bottom: 25px;
    line-height: 1.8;
    position: relative;
    z-index: 1;
  }

  .testimonial-author {
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .author-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary);
  }

  .author-info h4 {
    font-size: 1.2rem;
    color: var(--dark);
    margin-bottom: 5px;
  }

  .author-info p {
    font-size: 0.9rem;
    color: var(--text-light);
  }

  /* CTA Section */
  .cta-section {
    background: var(--gradient-primary);
    color: white;
    text-align: center;
    padding: 120px 20px;
    position: relative;
    overflow: hidden;
  }

  .cta-section:before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
  }

  .cta-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
  }

  .cta-section h2 {
    font-size: 3rem;
    margin-bottom: 25px;
    line-height: 1.2;
  }

  .cta-section p {
    font-size: 1.3rem;
    max-width: 700px;
    margin: 0 auto 40px;
    opacity: 0.9;
    font-weight: 300;
  }

  /* Footer */
  footer {
    background-color: var(--darker);
    color: white;
    padding: 80px 0 40px;
    position: relative;
  }

  footer:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 10px;
    background: var(--gradient-secondary);
  }

  .footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 50px;
    margin-bottom: 50px;
  }

  .footer-column h3 {
    font-size: 1.5rem;
    margin-bottom: 25px;
    position: relative;
    display: inline-block;
    color: white;
  }

  .footer-column h3:after {
    content: '';
    position: absolute;
    width: 50px;
    height: 4px;
    background: var(--secondary);
    bottom: -10px;
    left: 0;
    border-radius: 2px;
  }

  .footer-column p {
    color: rgba(255,255,255,0.75);
    margin-bottom: 15px;
    line-height: 1.6;
  }

  .contact-info {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 15px;
  }

  .contact-icon {
    color: var(--secondary);
    font-size: 1.1rem;
    margin-top: 3px;
    flex-shrink: 0;
  }

  .social-links {
    display: flex;
    gap: 15px;
    margin-top: 25px;
  }

  .social-links a {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    transition: var(--transition);
  }

  .social-links a:hover {
    background: var(--secondary);
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(245, 158, 11, 0.4);
  }

  .copyright {
    text-align: center;
    padding-top: 40px;
    border-top: 1px solid rgba(255,255,255,0.1);
    color: rgba(255,255,255,0.6);
    font-size: 0.95rem;
  }

  /* Animations */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(40px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes pulse {
    0% { transform: scale(1); opacity: 0.15; }
    50% { transform: scale(1.1); opacity: 0.25; }
    100% { transform: scale(1); opacity: 0.15; }
  }

  @keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
  }

  /* Responsive Design */
  @media (max-width: 1200px) {
    .hero h1 {
      font-size: 3.5rem;
    }
    
    .section-title h2 {
      font-size: 2.8rem;
    }
  }

  @media (max-width: 992px) {
    .hero h1 {
      font-size: 3rem;
    }

    .hero p {
      font-size: 1.2rem;
    }

    .section {
      padding: 100px 0;
    }
    
    .section-title h2 {
      font-size: 2.5rem;
    }
    
    .section-title p {
      font-size: 1.1rem;
    }
    
    .feature-card {
      padding: 40px 30px;
    }
  }

  @media (max-width: 768px) {
    .nav-links {
      display: none;
    }
    
    .mobile-menu-btn {
      display: block;
    }
    
    .hero {
      padding: 120px 20px 60px;
    }
    
    .hero h1 {
      font-size: 2.5rem;
    }

    .hero p {
      font-size: 1.1rem;
    }
    
    .btn {
      padding: 14px 28px;
      font-size: 1rem;
    }
    
    .section-title h2 {
      font-size: 2.2rem;
    }
    
    .section-title h2:after {
      width: 70px;
      height: 4px;
      bottom: -10px;
    }
    
    .features {
      grid-template-columns: 1fr;
      gap: 30px;
    }
    
    .cta-section h2 {
      font-size: 2.5rem;
    }
    
    .cta-section p {
      font-size: 1.1rem;
    }
    
    .footer-content {
      grid-template-columns: 1fr;
      gap: 40px;
      text-align: center;
    }
    
    .footer-column h3:after {
      left: 50%;
      transform: translateX(-50%);
    }
    
    .social-links {
      justify-content: center;
    }
  }

  @media (max-width: 576px) {
    .container {
      padding: 0 24px;
    }
    
    .hero h1 {
      font-size: 2.2rem;
    }
    
    .btn-group {
      flex-direction: column;
      align-items: center;
      gap: 15px;
    }
    
    .btn {
      width: 100%;
      max-width: 280px;
    }
    
    .section-title h2 {
      font-size: 2rem;
    }
    
    .stat-number {
      font-size: 3.5rem;
    }
    
    .testimonials {
      grid-template-columns: 1fr;
    }
  }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="header" id="header">
    <div class="container">
      <a href="#" class="logo">
        <i class="fas fa-shuttlecock logo-icon"></i>
        <span>Alviza</span>
      </a>
      <nav class="nav-links">
        <a href="#">Beranda</a>
        <a href="#">Program</a>
        <a href="#">Pelatih</a>
        <a href="#">Jadwal</a>
        <a href="#">Kontak</a>
      </nav>
      <button class="mobile-menu-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Raih Prestasi dengan Pelatihan Berkualitas</h1>
      <p>Program pelatihan badminton profesional dengan metode terkini dan pelatih bersertifikat untuk semua level</p>
      <div class="btn-group">
        <a href="{{ route('login') }}" class="btn btn-primary">
          Mulai Sekarang
          <i class="fas fa-arrow-right btn-icon"></i>
        </a>
        <a href="{{ route('register') }}" class="btn btn-secondary">
          Daftar Member
          <i class="fas fa-user-plus btn-icon"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <h2>Program Unggulan Kami</h2>
        <p>Pilih program yang dirancang khusus untuk membawa permainan Anda ke level berikutnya dengan kurikulum terstruktur</p>
      </div>

      <div class="features">
        <div class="feature-card">
          <div class="feature-icon"><i class="fas fa-shuttlecock"></i></div>
          <h3>Dasar Badminton</h3>
          <p>Pelatihan fundamental untuk membangun teknik dasar yang benar, meliputi grip, footwork, dan pukulan dasar dengan metode pengajaran yang sistematis.</p>
        </div>

        <div class="feature-card">
          <div class="feature-icon"><i class="fas fa-bolt"></i></div>
          <h3>Intermediate</h3>
          <p>Pengembangan teknik menengah termasuk pukulan serangan, pertahanan, dan strategi permainan dengan analisis video untuk perbaikan performa.</p>
        </div>

        <div class="feature-card">
          <div class="feature-icon"><i class="fas fa-trophy"></i></div>
          <h3>Advanced & Kompetitif</h3>
          <p>Program intensif untuk persiapan turnamen dengan pelatihan fisik khusus, taktik permainan, dan pembinaan mental juara.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="stats-section">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-number">500+</div>
          <div class="stat-label">Siswa Aktif</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">15</div>
          <div class="stat-label">Pelatih Profesional</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">50+</div>
          <div class="stat-label">Turnamen Dimenangkan</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">100%</div>
          <div class="stat-label">Kepuasan Siswa</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <h2>Apa Kata Mereka</h2>
        <p>Testimoni dari siswa dan orang tua yang telah merasakan manfaat program pelatihan kami</p>
      </div>

      <div class="testimonials">
        <div class="testimonial-card">
          <div class="testimonial-content">
            "Pelatih di Alviza sangat profesional dan perhatian. Dalam 3 bulan, skill anak saya meningkat drastis dan sekarang lebih percaya diri di lapangan."
          </div>
          <div class="testimonial-author">
            <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Budi Santoso" class="author-avatar">
            <div class="author-info">
              <h4>Budi Santoso</h4>
              <p>Orang Tua Siswa</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-content">
            "Metode pelatihan yang sistematis dan fasilitas yang lengkap membuat saya bisa fokus meningkatkan permainan. Sekarang sudah berani ikut turnamen regional."
          </div>
          <div class="testimonial-author">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Rina Wijaya" class="author-avatar">
            <div class="author-info">
              <h4>Rina Wijaya</h4>
              <p>Siswa Advanced</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-content">
            "Dari pemula total, sekarang sudah bisa bermain dengan teknik yang benar dan menghindari cedera. Pelatih sangat sabar dalam mengajar dasar-dasar."
          </div>
          <div class="testimonial-author">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Andi Pratama" class="author-avatar">
            <div class="author-info">
              <h4>Andi Pratama</h4>
              <p>Siswa Pemula</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="cta-content">
      <h2>Siap Mengubah Permainan Anda?</h2>
      <p>Daftar sekarang dan dapatkan sesi percobaan gratis dengan pelatih profesional kami!</p>
      <div class="btn-group">
        <a href="{{ route('schedules.index') }}" class="btn btn-primary">
          Lihat Jadwal
          <i class="fas fa-calendar-alt btn-icon"></i>
        </a>
        <a href="{{ route('coaches.index') }}" class="btn btn-secondary">
          Temui Pelatih
          <i class="fas fa-users btn-icon"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-column">
          <h3>Alviza Badminton</h3>
          <p>Pusat pelatihan badminton profesional dengan standar internasional, mencetak atlet berprestasi sejak 2015.</p>
          <div class="social-links">
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>

        <div class="footer-column">
          <h3>Kontak Kami</h3>
          <div class="contact-info">
            <i class="fas fa-map-marker-alt contact-icon"></i>
            <p>Jl. Raya Badminton No. 123, Jakarta Selatan, Indonesia</p>
          </div>
          <div class="contact-info">
            <i class="fas fa-phone-alt contact-icon"></i>
            <p>(021) 1234-5678 / 0812-3456-7890</p>
          </div>
          <div class="contact-info">
            <i class="fas fa-envelope contact-icon"></i>
            <p>info@alvizabadminton.com</p>
          </div>
        </div>

        <div class="footer-column">
          <h3>Jam Operasional</h3>
          <div class="contact-info">
            <i class="fas fa-clock contact-icon"></i>
            <p><strong>Senin-Jumat:</strong> 08.00 - 21.00 WIB</p>
          </div>
          <div class="contact-info">
            <i class="fas fa-clock contact-icon"></i>
            <p><strong>Sabtu-Minggu:</strong> 07.00 - 19.00 WIB</p>
          </div>
          <div class="contact-info">
            <i class="fas fa-calendar-times contact-icon"></i>
            <p><strong>Hari Libur:</strong> Tutup</p>
          </div>
        </div>
      </div>

      <div class="copyright">
        <p>&copy; 2023 Alviza Badminton Academy. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <script>
    // Header scroll effect
    window.addEventListener('scroll', function() {
      const header = document.getElementById('header');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    
    mobileMenuBtn.addEventListener('click', function() {
      navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
    });

    // Close mobile menu when clicking a link
    document.querySelectorAll('.nav-links a').forEach(link => {
      link.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
          navLinks.style.display = 'none';
        }
      });
    });

    // Animate elements when they come into view
    const animateOnScroll = function() {
      const elements = document.querySelectorAll('.feature-card, .testimonial-card, .stat-item');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementPosition < windowHeight - 100) {
          element.style.animation = 'fadeInUp 0.6s ease-out forwards';
        }
      });
    };

    // Run once on load and then on scroll
    window.addEventListener('load', animateOnScroll);
    window.addEventListener('scroll', animateOnScroll);

    // Responsive navigation
    function handleResize() {
      if (window.innerWidth > 768) {
        navLinks.style.display = 'flex';
      } else {
        navLinks.style.display = 'none';
      }
    }

    window.addEventListener('resize', handleResize);
  </script>
</body>
</html>