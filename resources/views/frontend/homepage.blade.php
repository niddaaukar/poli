@extends('frontend.layout.app')
@section('content')
@include('frontend.components.navbar-homepage')
  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <div class="company-badge mb-4">
              <i class="fa-regular fa-bell" ></i>
                A11.2021.13495
              </div>
              <h1 class="mb-4">
                Sistem Temu Janji<br>
                <span class="accent-text">Pasien - Dokter</span>
              </h1>
              <p class="mb-4 mb-md-5">
                Apa yang kita pikirkan adalah sugesti, maka berpikirlah yang menyenangkan maka harimuu tidak terlalu berat
              </p>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
            <img src="{{ asset('img/home-new.png') }}" alt="Home Image" class="home-image">
              <div class="customers-badge">
                <div class="customer-avatars">
                <img src="{{ asset('img/avatar-1.webp') }}" alt="Customer 1" class="avatar">
                <img src="{{ asset('img/avatar-2.webp') }}" alt="Customer 2" class="avatar">
                <img src="{{ asset('img/avatar-3.webp') }}" alt="Customer 3" class="avatar">
                <img src="{{ asset('img/avatar-4.webp') }}" alt="Customer 4" class="avatar">
                <img src="{{ asset('img/avatar-5.webp') }}" alt="Customer 5" class="avatar">
   
                  <span class="avatar more">12+</span>
                </div>
                <p class="mb-0 mt-2">15 Dokter siap membantu anda</p>
              </div>
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
                <p class="mb-0" style="text-align: justify">Pasien dapat mengurangi waktu tunggu dengan jadwal yang sudah ditentukan sebelumnya</p>
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
                <p class="mb-0" style="text-align: justify">Jadwal terstruktur memaksimalkan waktu perawatan dan menghindari keterlambatan</p>
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
                <p class="mb-0" style="text-align: justify">Pasien dapat memilih waktu yang sesuai, meningkatkan kenyamanan selama perawatan</p>
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
                <p class="mb-0" style="text-align: justify">Sistem temu janji mengatur jumlah pasien agar tidak ada penumpukan</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- /Hero Section -->
  <!-- Login/Register Section -->
  <section id="features" class="features section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Registrasi / Login</h2>
      <p>Pilihlah sesuai dengan kondisi anda. Jangan gunakan untuk hal yang tidak perlu.</p>
    </div><!-- End Section Title -->
    <div class="container">
      <div class="d-flex justify-content-center">
        <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
              <h4>Pasien</h4>
            </a>
          </li><!-- End tab nav item -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
              <h4>Dokter</h4>
            </a><!-- End tab nav item -->
        </ul>
      </div>
      <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
        <div class="tab-pane fade active show" id="features-tab-1">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
              <h3>Registrasi Sebagai Pasien</h3>
              <p class="fst-italic">
                Apabila anda seorang Pasien, silahkan Registrasi terlebih dahulu untuk melakukan pendaftaran sebagai pasien.
              </p>
              <a class="btn-getstarted" href="index.html#about">Registrasi</a>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{ asset('img/regis-pasien.png') }}" alt="Registrasi Pasien" class="regis-image">

            </div>
          </div>
        </div><!-- End tab content item -->

        <div class="tab-pane fade" id="features-tab-2">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
              <h3>Login Sebagai Dokter</h3>
              <p class="fst-italic">
                Apabila anda seorang Dokter, silahkan Login terlebih dahulu untuk memulai melayani pasien.
              </p>
              <a class="btn-getstarted" href="index.html#about">Login</a>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{ asset('img/login-doctor.png') }}" alt="Login Dokter" class="login-image">

            </div>
          </div>
        </div><!-- End tab content item -->

      </div>

    </div>

  </section>
  <!-- END Login/Register Section -->
    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">Tentang Kami</span>
            <h2 class="about-title">Poliklinik Universitas Dian Nuswantoro</h2>
            <p class="about-description", style="text-align: justify">Poliklinik Universitas Dian Nuswantoro (UDINUS) didirikan untuk memberikan fasilitas pelayanan kesehatan bagi mahasiswa dan karyawan, dan juga masyarakat umum di wilayah sekitar kampus. Sampai saat ini Poliklinik UDINUS menyediakan poliklinik umum dan poliklinik gigi. Poliklinik ini diharapkan dapat memberikan manfaat dari segi pelayanan medis yang murah dan berkualitas untuk mahasiswa dan karyawan di UDINUS. Untuk klinik gigi dilengkapi dengan dokter gigi dan peralatan yang sesuai. Setiap siswa di Dinus Universitas memiliki hak untuk menggunakan layanan poliklinik yang dialokasikan di setiap jam kerja dari Senin sampai Sabtu, mulai 08:00-06:00.</p>
            <div class="info-wrapper">
              <div class="row gy-4">
                <div class="col-lg-5">
                  <!-- <div class="profile d-flex align-items-center gap-3">
                    <img src="assets/img/avatar-1.webp" alt="CEO Profile" class="profile-image">
                    <div>
                      <h4 class="profile-name">Dani</h4>
                      <p class="profile-position">Admin Poli</p>
                    </div>
                  </div> -->
                </div>
                <div class="col-lg-7">
                  <!-- <div class="contact-info d-flex align-items-center gap-2">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                      <p class="contact-label">Butuh bantuan ?</p>
                      <p class="contact-number">+62 5677-67377-7899</p>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
              <img src="{{ asset('img/about3.jpg') }}" alt="Business Meeting" class="img-fluid main-image rounded-4">
              <img src="{{ asset('img/about4.jpg') }}" alt="Team Discussion" class="img-fluid small-image rounded-4">
              </div>
              <div class="experience-badge floating" style="background-color: #ffc107; color: #212529; padding: 15px; border-radius: 10px; text-align: center;">
                  <h3 style="margin: 0; font-size: 24px; font-weight: bold;">10 <span>Tahun</span></h3>
                  <p style="margin: 5px 0 0; font-size: 16px;">Telah berdiri di UDINUS</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      </div>
    </section>
    <!-- /Call To Action Section -->
     <!-- Layanan Section -->
    <section id="services" class="services section light-background">
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
                <p style="text-align: justify">Poli Umum menyediakan layanan kesehatan dasar untuk keluhan ringan hingga sedang. Dokter melakukan diagnosis awal, memberikan pengobatan, dan merujuk pasien ke poli spesialis jika diperlukan.</p>
                <a href="service-details.html" class="read-more">Detail<i class="bi bi-arrow-right"></i></a>
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
                <p style="text-align: justify">Poli Spesialis memberikan perawatan khusus sesuai dengan bidang tertentu oleh dokter spesialis. Pasien biasanya dirujuk ke sini jika membutuhkan penanganan lebih spesifik.</p>
                <a href="service-details.html" class="read-more">Detail<i class="bi bi-arrow-right"></i></a>
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
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-1.png') }}" class="img-fluid" alt="Client 1"></div>
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-2.png') }}" class="img-fluid" alt="Client 2"></div>
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-3.png') }}" class="img-fluid" alt="Client 3"></div>
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-4.png') }}" class="img-fluid" alt="Client 4"></div>
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-5.png') }}" class="img-fluid" alt="Client 5"></div>
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-6.png') }}" class="img-fluid" alt="Client 6"></div>
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-7.png') }}" class="img-fluid" alt="Client 7"></div>
          <div class="swiper-slide"><img src="{{ asset('img/clients/client-8.png') }}" class="img-fluid" alt="Client 8"></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- /Clients Section -->
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni</h2>
        <p>Kata mereka yang telah mendapatkan layanan di POLI UDINUS</p>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-item">
              <img src="{{ asset('img/testimonials/testimoni01.png') }}" class="testimonial-img" alt="">
              <h3>Nida Aulia Karima</h3>
              <h4>Teknik Informatika</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
          <!-- End testimonial item -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="testimonial-item">
            <img src="{{ asset('img/testimonials/testimoni2.jpeg') }}" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
          <!-- End testimonial item -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="testimonial-item">
            <img src="{{ asset('img/testimonials/testimoni3.jpeg') }}" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
          <!-- End testimonial item -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="testimonial-item">
            <img src="{{ asset('img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
          <!-- End testimonial item -->
        </div>
      </div>
    </section>
    <!-- EndTestimonials Section -->
    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">
      <div class="container">
        <div class="row">
          <div class="col-lg-5" data-aos="fade-up">
            <h2 class="faq-title">Pertanyaan Umum</h2>
            <p class="faq-description">Berikut pertanyaan yang sering diajukan</p>
            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
              <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
              </svg>
            </div>
          </div>
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->
              <div class="faq-item">
                <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->
              <div class="faq-item">
                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->
              <div class="faq-item">
                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->
              <div class="faq-item">
                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->
              <div class="faq-item">
                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                <div class="faq-content">
                  <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Faq Section -->
    <!-- Butuh Bantuan Section -->
    <section id="call-to-action-2" class="call-to-action-2 section dark-background">
      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Butuh Bantuan ?</h3>
              <p>Jika Anda mengalami kendala saat melakukan pemesanan temu janji, jangan ragu untuk menghubungi admin kami. 
              Kami siap membantu Anda dengan sepenuh hati.</p>
              <a class="btn btn-warning shadow-sm" href="#">Hubungi</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Butuh Bantuan Section -->
    <!-- Kontak Section -->
    <section id="contact" class="contact section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak Kami</h2>
        <p>Untuk informasi lebih lanjut, silakan hubungi kami melalui detail yang tercantum di halaman Kontak Kami</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
              <!-- <h3>Kontak Kami</h3> -->
              <p>Informasi kontak poliklinik Universitas Dian Nuswantoro</p>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Lokasi</h4>
                  <p>JL. Nakula 1. Pendrikan Kidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50131</p>
                </div>
              </div>
              <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4>Nomor Telephone</h4>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div>
              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Alamat Email</h4>
                  <p>poliudinus@gmail.com</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
  <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
    <h3>Email</h3>
    <p>Silahkan lengkapi formulir dibawah ini untuk terhubung dengan tim poli lebih lanjut</p>
    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
      <div class="row gy-4">
        <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required="">
        </div>
        <div class="col-md-6 ">
          <input type="email" class="form-control" name="email" placeholder="Alamat Email" required="">
        </div>
        <div class="col-12">
          <input type="text" class="form-control" name="subject" placeholder="Subject Email" required="">
        </div>
        <div class="col-12">
          <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
        </div>
        <div class="col-12 text-start"> 
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Pesan anda telah terkirim. Terimakasih telah menggunakan layanan poli</div>
          <button type="submit" class="btn btn-warning shadow-sm px-4 py-2">
            Kirim Pesan
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

  </main>
  @include('frontend.components.footer-homepage')
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="fa-regular fa-circle-up"></i></a>
@endsection