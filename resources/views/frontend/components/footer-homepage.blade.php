<footer id="footer" class="footer">
  <div class="container footer-top" style="margin-left: 10%; /* Geser ke kanan */">
    <div class="row gy-4">
      <!-- Deskripsi Poli -->
      <div class="col-lg-4 col-md-6 footer-about" style="margin-bottom: 20px;"> <!-- Tambah jarak antar elemen -->
        <a href="index.html" class="logo d-flex align-items-center">
          <span class="sitename">Poli</span>
        </a>
        <div class="footer-contact pt-2" >
          <p style="text-align: justify;">
            Poliklinik Universitas Dian Nuswantoro (UDINUS) didirikan untuk memberikan fasilitas pelayanan kesehatan bagi mahasiswa dan karyawan, dan juga masyarakat umum di wilayah sekitar kampus. Sampai saat ini Poliklinik UDINUS menyediakan poliklinik umum dan poliklinik gigi. Poliklinik ini diharapkan dapat memberikan manfaat dari segi pelayanan medis yang murah dan berkualitas untuk mahasiswa dan karyawan di UDINUS. Untuk klinik gigi dilengkapi dengan dokter gigi dan peralatan yang sesuai.
          </p>
        </div>
      </div>
      <!-- Link Cepat -->
      <div class="col-lg-2 col-md-8 footer-links" style="margin-bottom: 40px; padding-top: 10px;"> <!-- Tambah jarak antar elemen -->
        <h4>Link Cepat</h4>
        <ul>
          <li><a href="#">Beranda</a></li>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Layanan</a></li>
          <li><a href="#">Kontak Kami</a></li>
        </ul>
      </div>

      <!-- Hubungi Kami -->
      <div class="col-lg-2 col-md-3 footer-links" style="margin-bottom: 20px; padding-top: 10px;"> <!-- Tambah jarak antar elemen -->
        <h4>Hubungi Kami</h4>
        <ul>
          <li><a href="mailto:poli@gmail.com">Email: poli@gmail.com</a></li>
          <li><a href="tel:+155895548855">Phone: +1 5589 55488 55</a></li>
        </ul>
      </div>

      <!-- Sosial Media -->
      <div class="col-lg-2 col-md-3 footer-links" style="margin-bottom: 20px; padding-top: 10px;"> <!-- Tambah jarak antar elemen -->
        <h4>Sosial Media</h4>
        <div class="social-links d-flex mt-4">
          <a href="{{ $setting->sosmed_fb ?? '#' }}" target="_blank"><i class="fab fa-facebook"></i></a>
          <a href="{{ $setting->sosmed_ig ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="{{ $setting->sosmed_yt ?? '#' }}" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container copyright text-center mt-4" style="margin-left: 10%;">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">Poliklinik Udinus</strong> <span>All Rights Reserved</span></p>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">Nida Aulia Karima</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
    </div>
  </div>
</footer>
