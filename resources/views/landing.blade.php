<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Badminton Profesional | Alviza</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0066CC;
            --secondary: #FF6B00;
            --dark: #003366;
            --light: #F8F9FA;
            --accent: #00CC99;
            --text: #333333;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header & Hero Section */
        .hero {
            background: linear-gradient(135deg, rgba(0, 60, 120, 0.85) 0%, rgba(0, 30, 60, 0.9) 100%), 
                        url('https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            padding: 100px 20px;
        }
        
        .hero-content {
            max-width: 800px;
            animation: fadeInUp 0.8s ease-out;
        }
        
        .hero h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.2rem;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 35px;
            opacity: 0.9;
        }
        
        /* Button Styles */
        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        
        .btn {
            display: inline-block;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-align: center;
            cursor: pointer;
            border: none;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--secondary);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 0, 0.4);
        }
        
        .btn-primary:hover {
            background-color: #E05E00;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.5);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-secondary:hover {
            background-color: rgba(255,255,255,0.1);
            transform: translateY(-3px);
        }
        
        /* Features Section */
        .section {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }
        
        .section-title h2:after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background: var(--accent);
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .section-title p {
            font-size: 1.2rem;
            color: #666;
            max-width: 700px;
            margin: 20px auto 0;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 35px 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.4s ease;
            text-align: center;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: white;
            font-size: 2rem;
        }
        
        .feature-card h3 {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .feature-card p {
            color: #666;
            font-size: 1rem;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: white;
            text-align: center;
            padding: 80px 20px;
        }
        
        .cta-section h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            margin-bottom: 20px;
        }
        
        .cta-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 50px 0 30px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }
        
        .footer-column h3:after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background: var(--accent);
            bottom: -8px;
            left: 0;
        }
        
        .footer-column p, .footer-column a {
            color: rgba(255,255,255,0.7);
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background: var(--accent);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .btn-group {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 280px;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .feature-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Tingkatkan Skill Badminton Anda Bersama Kami</h1>
            <p>Pelatihan profesional dengan metode terbaik untuk semua level, dari pemula hingga kompetitif</p>
            <div class="btn-group">
                <a href="{{ route('login') }}" class="btn btn-primary">Login Sekarang</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Daftar Member</a>
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Program Pelatihan Kami</h2>
                <p>Pilih program yang sesuai dengan kebutuhan dan level permainan Anda</p>
            </div>
            
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">🏸</div>
                    <h3>Dasar Badminton</h3>
                    <p>Pelatihan fundamental untuk pemula dengan pengenalan teknik dasar dan peraturan permainan</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Intermediate</h3>
                    <p>Pengembangan teknik lanjutan dan strategi permainan untuk level menengah</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3>Advanced & Kompetitif</h3>
                    <p>Pelatihan intensif untuk persiapan turnamen dan kompetisi profesional</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Siap Memulai Perjalanan Badminton Anda?</h2>
            <p>Daftar sekarang dan dapatkan sesi percobaan gratis dengan pelatih profesional kami</p>
            <div class="btn-group">
                <a href="{{ route('schedules.index') }}" class="btn btn-primary">Lihat Jadwal</a>
                <a href="{{ route('coaches.index') }}" class="btn btn-secondary">Pelatih Kami</a>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Alviza Training</h3>
                    <p>Pusat pelatihan badminton profesional dengan fasilitas lengkap dan pelatih bersertifikat</p>
                    <div class="social-links">
                        <a href="#"><span>📱</span></a>
                        <a href="#"><span>📧</span></a>
                        <a href="#"><span>📞</span></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Kontak Kami</h3>
                    <p>Jl. Raya Badminton No. 123</p>
                    <p>Jakarta, Indonesia</p>
                    <p>Email: info@alvizatraining.com</p>
                    <p>Telepon: (021) 1234-5678</p>
                </div>
                
                <div class="footer-column">
                    <h3>Jam Operasional</h3>
                    <p>Senin-Jumat: 08.00 - 21.00</p>
                    <p>Sabtu-Minggu: 07.00 - 19.00</p>
                    <p>Hari Libur: Tutup</p>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 Alviza Training Badminton. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>