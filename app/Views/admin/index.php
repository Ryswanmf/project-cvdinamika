<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <!-- Produk Stat -->
        <div class="col-md-4">
            <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(45deg, #0d6efd, #0a58ca);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title text-white-50 text-uppercase mb-2 small fw-bold">Total Produk</h6>
                            <h2 class="fw-bold mb-0"><?= $total_products ?></h2>
                        </div>
                        <div class="fs-1 text-white-50">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <a href="<?= site_url('admin/product-catalog') ?>" class="text-white-50 small mt-3 d-block text-decoration-none">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pesan Masuk Stat -->
        <div class="col-md-4">
            <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(45deg, #dc3545, #b02a37);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title text-white-50 text-uppercase mb-2 small fw-bold">Pesan Belum Dibaca</h6>
                            <h2 class="fw-bold mb-0"><?= $unread_contacts ?></h2>
                        </div>
                        <div class="fs-1 text-white-50">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <a href="<?= site_url('admin/kontak') ?>" class="text-white-50 small mt-3 d-block text-decoration-none">
                        Buka Inbox <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Blog Stat -->
        <div class="col-md-4">
            <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(45deg, #198754, #146c43);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title text-white-50 text-uppercase mb-2 small fw-bold">Artikel Blog</h6>
                            <h2 class="fw-bold mb-0"><?= $total_blogs ?></h2>
                        </div>
                        <div class="fs-1 text-white-50">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                    <a href="<?= site_url('admin/blog') ?>" class="text-white-50 small mt-3 d-block text-decoration-none">
                        Kelola Blog <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Visitor Stats -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="icon-box bg-primary rounded-3 me-3">
                        <i class="fas fa-users fa-3x text-white"></i>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase small fw-bold mb-1">
                            <i class="fas fa-globe me-1"></i>Total Pengunjung
                        </h6>
                        <h3 class="fw-bold mb-0 counter"><?= number_format($visitors_total) ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="icon-box bg-success rounded-3 me-3">
                        <i class="fas fa-user-clock fa-3x text-white"></i>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase small fw-bold mb-1">
                            <i class="fas fa-calendar-day me-1"></i>Pengunjung Hari Ini
                        </h6>
                        <h3 class="fw-bold mb-0 counter"><?= number_format($visitors_today) ?></h3>
                        <small class="text-success fw-bold">
                            <i class="fas fa-arrow-up me-1"></i>Active Now
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="icon-box bg-info rounded-3 me-3">
                        <i class="fas fa-history fa-3x text-white"></i>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase small fw-bold mb-1">
                            <i class="fas fa-calendar-check me-1"></i>Pengunjung Kemarin
                        </h6>
                        <h3 class="fw-bold mb-0 counter"><?= number_format($visitors_yesterday) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <!-- Chart Section -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-chart-line me-2 text-primary"></i>Statistik Kunjungan (7 Hari Terakhir)</h5>
                </div>
                <div class="card-body">
                    <div style="height: 300px;">
                        <canvas id="visitorChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-bolt me-2 text-warning"></i>Aksi Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="<?= site_url('admin/produk/create') ?>" class="btn btn-outline-primary text-start p-3 rounded-3">
                            <i class="fas fa-plus-circle me-2"></i> Tambah Produk Baru
                        </a>
                        <a href="<?= site_url('admin/blog/create') ?>" class="btn btn-outline-success text-start p-3 rounded-3">
                            <i class="fas fa-edit me-2"></i> Tulis Artikel Blog
                        </a>
                        <a href="<?= site_url('admin/projects/create') ?>" class="btn btn-outline-info text-start p-3 rounded-3">
                            <i class="fas fa-project-diagram me-2"></i> Tambah Portofolio
                        </a>
                        <a href="<?= site_url('admin/settings') ?>" class="btn btn-outline-secondary text-start p-3 rounded-3">
                            <i class="fas fa-cog me-2"></i> Pengaturan Situs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="fas fa-inbox me-2 text-primary"></i>Pesan Masuk Terbaru</h5>
                <a href="<?= site_url('admin/kontak') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">Lihat Semua</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="ps-4 py-3">Pengirim</th>
                            <th class="py-3">Subjek</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-end pe-4">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($recent_contacts)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">Tidak ada pesan terbaru.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($recent_contacts as $contact): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= esc($contact['name']) ?></div>
                                    <small class="text-muted"><?= esc($contact['email']) ?></small>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 250px;">
                                        <?= esc($contact['subject']) ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if($contact['status'] == 'unread'): ?>
                                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Baru</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">Dibaca</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4 text-muted small">
                                    <?= date('d M Y', strtotime($contact['created_at'])) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Chart Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('visitorChart').getContext('2d');
        
        // Gradient fill
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(13, 110, 253, 0.2)');   
        gradient.addColorStop(1, 'rgba(13, 110, 253, 0)');

        const visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?= '"' . implode('","', array_column($chart_data, 'date')) . '"' ?>],
                datasets: [{
                    label: 'Pengunjung',
                    data: [<?= implode(',', array_column($chart_data, 'count')) ?>],
                    borderColor: '#0d6efd',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    tension: 0.4, // Smooth curve
                    fill: true,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#0d6efd',
                    pointRadius: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [5, 5]
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>

    <style>
        /* Icon container box */
        .icon-box {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        
        .icon-box:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }

        /* Hover effect untuk card */
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
        }

        /* Icon pulse animation */
        .icon-pulse {
            position: relative;
            animation: pulse-shadow 2s infinite;
        }

        @keyframes pulse-shadow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(78, 115, 223, 0.4);
            }
            50% {
                box-shadow: 0 0 20px 5px rgba(78, 115, 223, 0);
            }
        }

        /* Counter number animation */
        .counter {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            letter-spacing: -0.5px;
        }

        /* Rounded icon container */
        .btn-square {
            transition: all 0.3s ease;
        }

        .hover-lift:hover .btn-square {
            transform: rotate(5deg) scale(1.1);
        }

        /* Active Now badge pulse */
        @keyframes pulse-text {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .text-success i {
            animation: pulse-text 2s infinite;
        }
    </style>
<?= $this->endSection() ?>
