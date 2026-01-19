<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?> - CV Dinamika</title>
    <!-- Use local Bootstrap from public/css -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        /* Sidebar Styling */
        .sidebar {
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            border-radius: 8px;
            margin-bottom: 5px;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd !important;
            box-shadow: 0 4px 6px rgba(13, 110, 253, 0.4);
            color: #ffffff !important;
        }
        .sidebar .nav-link.active i {
            color: #ffffff !important;
        }

        /* Main Content */
        .main-content {
            padding: 30px;
            overflow-y: auto;
            height: 100vh;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8; 
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <?= $this->include('admin/layout-admin/sidebar') ?>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-5 bg-white p-4 rounded-3 shadow-sm">
                <div>
                    <h2 class="mb-0 fw-bold text-dark"><?= $page_title ?? 'Dashboard' ?></h2>
                    <p class="text-muted mb-0 small">Overview & Statistik</p>
                </div>
                
                <div class="d-flex align-items-center">
                    <div class="me-4 text-end d-none d-md-block">
                        <small class="text-muted d-block">Login sebagai</small>
                        <span class="fw-bold text-dark"><?= session()->get('user_name') ?? 'Admin' ?></span>
                    </div>
                    <a href="/logout" class="btn btn-outline-danger rounded-pill px-4">
                        Logout
                    </a>
                </div>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                    ✅ <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                    ⚠️ <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Use local Bootstrap JS from public/js -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>