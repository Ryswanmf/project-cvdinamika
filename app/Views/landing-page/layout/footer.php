    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <a href="/" class="d-inline-block mb-3">
                        <h1 class="text-white"><?= $settings['site_title'] ?? 'CV Dinamika' ?></h1>
                    </a>
                    <p class="mb-0"><?= $settings['site_description'] ?? 'Deskripsi Perusahaan' ?></p>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i><?= $settings['contact_address'] ?? 'Jl. Raden Saleh No.18 Rt.002/Rw.009 Karang Mulya Karang Tengah Kota Tangerang Titik Kios Mega Ria Ruko Pojok No.5, Patokan Samping Gepuk Pak Gembus Sebrang Klinik Stella Medika' ?></p>
                    <p><i class="fa fa-phone-alt me-3"></i><?= $settings['contact_phone'] ?? '+62 0813-1974-0808' ?></p>
                    <p><i class="fa fa-envelope me-3"></i><?= $settings['contact_email'] ?? 'harmony.decor26@gmail.com' ?></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://www.instagram.com/harmony_decor_karangtengah?igsh=MWUwazlldm5vMzF3dA==" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://tk.tokopedia.com/ZSaJJGgC2/" target="_blank"><i class="fas fa-shopping-bag"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://s.shopee.co.id/2g4xeUpgAS" target="_blank"><i class="fas fa-shopping-cart"></i></a>

                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <h5 class="text-white mb-4">Popular Link</h5>
                    <a class="btn btn-link" href="/">Beranda</a>
                    <a class="btn btn-link" href="/produk">Produk</a>
                    <a class="btn btn-link" href="/portofolio">Portofolio</a>
                    <a class="btn btn-link" href="/blog">Blog</a>
                    <a class="btn btn-link" href="/kontak">Kontak</a>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="text-white mb-4">Our Services</h5>
                    <a class="btn btn-link" href="/">Penjualan Produk</a>
                    <a class="btn btn-link" href="/">Survey Lokasi Pemasangan</a>
                    <a class="btn btn-link" href="/">Pengiriman Tepat Waktu</a>
                    <a class="btn btn-link" href="/">Pemasangan Produk</a>
                    <a class="btn btn-link" href="/">Garansi Material</a>
                    <a class="btn btn-link" href="/">Garansi Pemasangan</a>
                </div>
            </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="/"><?= $settings['site_title'] ?? 'CV Dinamika' ?></a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>