@extends('components.app')
@section('content')
    @include('frontend.components.navbar-homepage')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <h1 class="mb-4">
                                Sistem Temu Janji<br>
                                <span class="accent-text">Pasien - Dokter</span>
                            </h1>
                            <p class="mb-4 mb-md-5">
                                Apa yang kita pikirkan adalah sugesti, maka berpikirlah yang menyenangkan maka harimuu tidak
                                terlalu berat
                            </p>
                            <div class="hero-buttons">
                            @if (Auth::guard('pasien')->check()) 
                                    <!-- Pengguna terautentikasi -->
                                    <a href="{{ route('pasien.riwayat.index') }}" class="btn btn-primary me-sm-0 mx-0">
                                        Buat Janji
                                    </a>
                                         @else
                                    <!-- Pengguna tidak terautentikasi -->
                                    <a href="{{ route('register') }}" class="btn btn-primary me-sm-0 mx-0">
                                        Daftar untuk Buat Janji
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="{{ asset('img/home-new.png') }}" alt="Home Image" class="home-image">
                            
                        </div>
                    </div>
                </div>
                <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h4>Hemat Waktu</h4>
                                <p class="mb-0" style="text-align: justify">Pasien dapat mengurangi waktu tunggu dengan
                                    jadwal yang sudah ditentukan sebelumnya</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fa-regular fa-calendar-check"></i>
                            </div>
                            <div class="stat-content">
                                <h4>Efisien</h4>
                                <p class="mb-0" style="text-align: justify">Jadwal terstruktur memaksimalkan waktu
                                    perawatan dan menghindari keterlambatan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <div class="stat-content">
                                <h4>Nyaman</h4>
                                <p class="mb-0" style="text-align: justify">Pasien dapat memilih waktu yang sesuai,
                                    meningkatkan kenyamanan selama perawatan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fa-solid fa-list-check"></i>
                            </div>
                            <div class="stat-content">
                                <h4>Tertata</h4>
                                <p class="mb-0" style="text-align: justify">Sistem temu janji mengatur jumlah pasien agar
                                    tidak ada penumpukan</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /Hero Section -->
        <!-- About Section -->
        <section id="tentang-kami" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 align-items-center justify-content-between">
                    <!-- Text Content -->
                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">Tentang Kami</span>
                        <h2 class="about-title">Poliklinik Universitas Dian Nuswantoro</h2>
                        <p class="about-description" style="text-align: justify;">
                            Poliklinik Universitas Dian Nuswantoro (UDINUS) didirikan untuk memberikan fasilitas pelayanan
                            kesehatan
                            bagi mahasiswa dan karyawan, dan juga masyarakat umum di wilayah sekitar kampus. Sampai saat ini
                            Poliklinik
                            UDINUS menyediakan poliklinik umum dan poliklinik gigi. Poliklinik ini diharapkan dapat
                            memberikan manfaat
                            dari segi pelayanan medis yang murah dan berkualitas untuk mahasiswa dan karyawan di UDINUS.
                            Untuk klinik gigi dilengkapi dengan dokter gigi dan peralatan yang sesuai. Setiap siswa di Dinus
                            Universitas
                            memiliki hak untuk menggunakan layanan poliklinik yang dialokasikan di setiap jam kerja dari
                            Senin sampai
                            Sabtu, mulai 08:00-18:00.
                        </p>
                    </div>

                    <!-- Image Content -->
                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper position-relative">
                            <div class="images" data-aos="zoom-out" data-aos-delay="400">
                                <img src="{{ asset('img/about3.jpg') }}" alt="Business Meeting"
                                    class="img-fluid main-image rounded-4">
                                <img src="{{ asset('img/about4.jpg') }}" alt="Team Discussion"
                                    class="img-fluid small-image rounded-4">
                            </div>
                            <div class="experience-badge floating"
                                style="background-color: #ffc107; color: #212529; padding: 15px; border-radius: 10px; text-align: center;">
                                <h3 style="margin: 0; font-size: 24px; font-weight: bold;">10 <span>Tahun</span></h3>
                                <p style="margin: 5px 0 0; font-size: 16px;">Telah berdiri di UDINUS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Call To Action Section -->
        <!-- Layanan Section -->
        <section id="layanan" class="services section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>Layanan</h2>
                <p>Layanan yang diberikan di Poliklinik Udinus</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="fa-solid fa-pills"></i>
                            </div>
                            <div>
                                <h3>Poli Umum</h3>
                                <p style="text-align: justify">Poli Umum menyediakan layanan kesehatan dasar untuk keluhan
                                    ringan hingga sedang. Dokter melakukan diagnosis awal, memberikan pengobatan, dan
                                    merujuk pasien ke poli spesialis jika diperlukan.</p>
                                <!-- <a href="service-details.html" class="read-more">Detail<i class="bi bi-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <!-- End Service Card -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="fa-solid fa-stethoscope"></i>
                            </div>
                            <div>
                                <h3>Poli Spesialis</h3>
                                <p style="text-align: justify">Poli Spesialis memberikan perawatan khusus sesuai dengan
                                    bidang tertentu oleh dokter spesialis. Pasien biasanya dirujuk ke sini jika membutuhkan
                                    penanganan lebih spesifik.</p>
                                <!-- <a href="service-details.html" class="read-more">Detail<i class="bi bi-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <!-- End Layanan Card -->
        </section>
        <!-- /Layanan Section -->
        <!-- Clients Section -->
        <section id="clients" class="clients section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('img/clients/udinus.png') }}" class="img-fluid"
                                alt="Client 1"></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/bengkelkoding.png') }}" class="img-fluid"
                                alt="Client 2"></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/logo-poli.png') }}" class="img-fluid"
                                alt="Client 3"></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/udinus.png') }}" class="img-fluid"
                                alt="Client 4"></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/bengkelkoding.png') }}" class="img-fluid"
                                alt="Client 5"></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/logo-poli.png') }}" class="img-fluid"
                                alt="Client 6"></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/udinus.png') }}" class="img-fluid"
                                alt="Client 7"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Clients Section -->
        <!-- Testimonials Section -->
        <section id="testimoni" class="testimonials section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimoni</h2>
                <p>Kata mereka yang telah mendapatkan layanan di POLI UDINUS</p>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <img src="{{ asset('img/testimonials/testimoni-1.png') }}" class="testimonial-img"
                                alt="">
                            <h3>Nida Aulia Karima</h3>
                            <h4>Teknik Informatika</h4>
                            <div class="stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </div>
                            <p>
                                    <i class="fa-solid fa-quote-left"></i>
                                <span>Website poli ini sangat membantu mahasiswa/i dalam memproses pesanan antrian di poli.</span>
                                    <i class="fa-solid fa-quote-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <img src="{{ asset('img/testimonials/testimoni-2.jpeg') }}" class="testimonial-img"
                                alt="">
                            <h3>Zia Kanesya</h3>
                            <h4>Desain Komunikasi Visual</h4>
                            <div class="stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </div>
                            <p>
                                    <i class="fa-solid fa-quote-left"></i>
                                <span>Website Poliklinik Udinus sangat membantu! Desainnya sederhana, informatif, dan mempermudah akses jadwal dokter serta riwayat pemeriksaan. Pelayanan jadi lebih efisien dan praktis.</span>
                                    <i class="fa-solid fa-quote-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-item">
                            <img src="{{ asset('img/testimonials/testimoni-3.jpeg') }}" class="testimonial-img"
                                alt="">
                            <h3>Galih Mohammad</h3>
                            <h4>Animasi</h4>
                            <div class="stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </div>
                            <p>
                                     <i class="fa-solid fa-quote-left"></i>
                                <span>Dengan adanya website Poliklinik Udinus, proses pendaftaran dan pengecekan jadwal menjadi lebih cepat. Sangat memudahkan mahasiswa dan staff untuk mendapatkan layanan kesehatan.</span>
                                    <i class="fa-solid fa-quote-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-item">
                            <img src="{{ asset('img/testimonials/testimoni-3.jpeg') }}" class="testimonial-img"
                                alt="">
                            <h3>Mahdi Mas</h3>
                            <h4>Teknik Mesin</h4>
                            <div class="stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </div>
                            <p>
                                    <i class="fa-solid fa-quote-left"></i>
                                <span>Fitur yang lengkap dan mudah digunakan. Riwayat pemeriksaan tersimpan rapi, sehingga tidak perlu repot mencatat manual. Solusi modern untuk layanan kesehatan kampus, namun juga berguna untuk umum</span>
                                    <i class="fa-solid fa-quote-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                </div>
            </div>
        </section>
        <!-- EndTestimonials Section -->
        <!-- Faq Section -->
        <section class="faq faq section light-background" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">Pertanyaan Umum</h2>
                        <p class="faq-description">Berikut pertanyaan yang sering diajukan</p>
                        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                            <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3>Bagaimana cara mendaftar sebagai pasien di website ini?</h3>
                                <div class="faq-content">
                                    <p>Mendaftar sebagai pasien silahkan mengisi formulir registrasi yang telah tersedia pada halaman paling atas.</p>
                                </div>
                                <i class="faq-toggle fa-solid fa-circle-question" style="transform: rotate(360deg)"></i>
                            </div>
                            <!-- End Faq item-->
                            <div class="faq-item">
                                <h3>Bagaimana cara membuat janji temu dengan dokter?</h3>
                                <div class="faq-content">
                                <p> Untuk membuat janji temu, Anda dapat menggunakan fitur "Buat Janji" di menu utama website ini.</p>
                                </div>
                                <i class="faq-toggle fa-solid fa-circle-question" style="transform: rotate(360deg)"></i>
                            </div>
                            <!-- End Faq item-->
                            <div class="faq-item">
                                <h3>Layanan apa saja yang tersedia di poli ini?</h3>
                                <div class="faq-content">
                                    <p>Layanan poli yang kami sediakan mulai dari poli umum dan poli spesialis</p>
                                </div>
                                <i class="faq-toggle fa-solid fa-circle-question" style="transform: rotate(360deg)"></i>
                            </div>
                            <!-- End Faq item-->
                            <div class="faq-item">
                                <h3>Di mana saya bisa melihat riwayat janji temu atau hasil pemeriksaan saya?</h3>
                                <div class="faq-content">
                                    <p>Pada fitur "Riwayat Periksa" yang akan tampil jika anda telah registrasi akun, maka riwayat periksa anda dapat dilihat.</p>
                                </div>
                                <i class="faq-toggle fa-solid fa-circle-question" style="transform: rotate(360deg)"></i>
                            </div>
                            <!-- End Faq item-->
                            <div class="faq-item">
                                <h3>Bagaimana cara menghubungi poli jika saya memiliki pertanyaan atau keluhan?</h3>
                                <div class="faq-content">
                                    <p>Anda dapat menghubungi alamat email yang tertera di bawah atau nomor kontak yang dapat dihubungi, untuk terhubung langsung dengan pihak poliklinik.</p>
                                </div>
                                <i class="faq-toggle fa-solid fa-circle-question" style="transform: rotate(360deg)"></i>
                            </div>
                            <!-- End Faq item-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Faq Section -->
        
    </main>
    @include('frontend.components.footer-homepage')
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="fa-regular fa-circle-up"></i></a>   
            <script>
        document.querySelectorAll('.faq-item').forEach(item => {
    item.addEventListener('click', () => {
        const isActive = item.classList.contains('faq-active');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('faq-active')); // Tutup semua
        if (!isActive) {
            item.classList.add('faq-active'); // Buka item yang diklik
        }
    });
});

    </script>
@endsection
