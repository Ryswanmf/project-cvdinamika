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
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?= $settings['contact_address'] ?? 'Jl. Raden Saleh No.18 Rt.002/Rw.009 Karang Mulya Karang Tengah Kota Tangerang' ?></p>
                    
                    <div class="mb-3">
                        <h6 class="text-white small fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">Store 1 (Harmony)</h6>
                        <p class="mb-1 small"><i class="fa fa-phone-alt me-3"></i>0813-1974-0808</p>
                        <p class="mb-1 small"><i class="fa fa-envelope me-3"></i>harmony.decor26@gmail.com</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-white small fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">Store 2 (Kumgang)</h6>
                        <p class="mb-1 small"><i class="fa fa-phone-alt me-3"></i>0857-7112-2100</p>
                        <p class="mb-1 small"><i class="fa fa-envelope me-3"></i>toko.kumgang26@gmail.com</p>
                    </div>

                    <div class="d-flex pt-2">
                        <?php if(!empty($settings['social_instagram'])): ?>
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="<?= $settings['social_instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        
                        <?php if(!empty($settings['social_facebook'])): ?>
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="<?= $settings['social_facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($settings['link_tokopedia'])): ?>
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="<?= $settings['link_tokopedia'] ?>" target="_blank"><i class="fas fa-shopping-bag"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($settings['link_shopee'])): ?>
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="<?= $settings['link_shopee'] ?>" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <h5 class="text-white mb-4">Popular Link</h5>
                    <a class="btn btn-link" href="/">Beranda</a>
                    <a class="btn btn-link" href="/produk">Produk</a>
                    <a class="btn btn-link" href="/portofolio">Portofolio</a>
                    <a class="btn btn-link" href="/blog">Blog</a>
                    <a class="btn btn-link" href="/kontak">Kontak</a>
                    <a class="btn btn-link" href="/faq">FAQ (Tanya Jawab)</a>
                    <a class="btn btn-link" href="/sitemap.xml">Sitemap</a>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="text-white mb-4">Our Services</h5>
                    <?php
                        // Pastikan data services tersedia di footer (fallback manual query jika tidak dikirim controller)
                        if (!isset($services)) {
                            $db = \Config\Database::connect();
                            $services = $db->table('services')->orderBy('sort_order', 'ASC')->get()->getResultArray();
                        }
                        
                        // Limit hanya 6 layanan di footer agar tidak kepanjangan
                        $footerServices = array_slice($services, 0, 6);
                        
                        if(!empty($footerServices)):
                            foreach($footerServices as $svc):
                                // Convert object to array if needed
                                $svc = (array) $svc; 
                                $svcTitle = esc($svc['title']);
                                $waLink = "https://wa.me/" . preg_replace('/[^0-9]/', '', $settings['contact_phone'] ?? '6281319740808') . "?text=" . urlencode("Halo, saya tertarik dengan layanan: " . $svcTitle);
                    ?>
                        <a class="btn btn-link" href="<?= $waLink ?>" target="_blank"><?= $svcTitle ?></a>
                    <?php 
                            endforeach;
                        else:
                    ?>
                        <!-- Fallback Static -->
                        <a class="btn btn-link" href="#">Penjualan Produk</a>
                        <a class="btn btn-link" href="#">Pemasangan</a>
                    <?php endif; ?>
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

    <!-- WhatsApp Multi-Agent Modal -->
    <div class="modal fade" id="waModal" tabindex="-1" aria-labelledby="waModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
                <div class="modal-header bg-success text-white border-0" style="border-radius: 20px 20px 0 0; padding: 25px;">
                    <h5 class="modal-title fw-bold" id="waModalLabel"><i class="fab fa-whatsapp me-2"></i> Hubungi Kami via WhatsApp</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-muted mb-4 text-center">Silakan pilih layanan yang ingin Anda hubungi:</p>
                    <div class="d-grid gap-3">
                        <!-- Store 1 -->
                        <a href="https://wa.me/6281319740808?text=Halo%20Harmony%20Decor%2C%20saya%20tertarik%20dengan..." target="_blank" class="wa-agent-card">
                            <div class="d-flex align-items-center p-3 border rounded-3 transition-hover">
                                <div class="agent-icon bg-success text-white rounded-circle me-3">
                                    <i class="fab fa-whatsapp fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Store 1 (Harmony)</h6>
                                    <small class="text-success"><i class="fa fa-circle me-1 small"></i> Online | Fast Response</small>
                                </div>
                                <i class="fa fa-chevron-right ms-auto text-muted"></i>
                            </div>
                        </a>
                        <!-- Store 2 -->
                        <a href="https://wa.me/6285771122100?text=Halo%20Toko%20Kumgang%2C%20saya%20tertarik%20dengan..." target="_blank" class="wa-agent-card">
                            <div class="d-flex align-items-center p-3 border rounded-3 transition-hover">
                                <div class="agent-icon bg-success text-white rounded-circle me-3">
                                    <i class="fab fa-whatsapp fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Store 2 (Kumgang)</h6>
                                    <small class="text-info"><i class="fa fa-circle me-1 small"></i> Online | Product Inquiry</small>
                                </div>
                                <i class="fa fa-chevron-right ms-auto text-muted"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <small class="text-muted">Kami siap melayani kebutuhan interior Anda.</small>
                </div>
            </div>
        </div>
    </div>

    <style>
        .wa-float-container { position: fixed; bottom: 90px; right: 30px; z-index: 100; }
        .float-wa {
            width: 60px; height: 60px; background-color: #25d366; color: #FFF; border-radius: 50px;
            text-align: center; font-size: 30px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            display: flex; align-items: center; justify-content: center;
            transition: all 0.3s ease; animation: pulse-wa 2s infinite; cursor: pointer; border: none;
        }
        .wa-agent-card { text-decoration: none !important; }
        .transition-hover:hover { background-color: #f8fcfb; border-color: #25d366 !important; transform: translateX(5px); transition: all 0.3s ease; }
        .agent-icon { width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; }
        
        @keyframes pulse-wa {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }
    </style>

    <div class="wa-float-container">
        <button class="float-wa" onclick="toggleWA()" title="Chat via WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </button>
    </div>

    <script>
        function toggleWA() {
            var myModal = new bootstrap.Modal(document.getElementById('waModal'));
            myModal.show();
        }
    </script>

    <!-- JavaScript Libraries -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Glightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });

        // Reading Progress Bar Logic
        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("scroll-progress").style.width = scrolled + "%";

            // Header Parallax Logic
            var pageHeader = document.querySelector('.page-title-box');
            if (pageHeader) {
                var scrollPosition = window.pageYOffset;
                pageHeader.style.backgroundPositionY = (scrollPosition * 0.5) + 'px';
            }
        };
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>