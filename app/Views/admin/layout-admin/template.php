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
            overflow-x: hidden;
        }
        
        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            height: 100vh;
            margin-left: -250px;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
            background: #fff;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            position: fixed;
            z-index: 1000;
            width: 250px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        #sidebar-wrapper::-webkit-scrollbar {
            width: 6px;
        }

        #sidebar-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #sidebar-wrapper::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        #sidebar-wrapper::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 10;
        }

        #sidebar-wrapper .list-group {
            width: 250px;
            padding-bottom: 20px;
        }

        #page-content-wrapper {
            min-width: 100vw;
            padding-left: 0; 
            padding-top: 20px;
            transition: all 0.25s ease-out;
        }

        /* Toggled State */
        body.sb-sidenav-toggled #sidebar-wrapper {
            margin-left: 0;
        }

        /* Desktop View */
        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
                margin-left: 250px;
            }

            body.sb-sidenav-toggled #sidebar-wrapper {
                margin-left: -250px;
            }

            body.sb-sidenav-toggled #page-content-wrapper {
                margin-left: 0;
            }
        }

        /* Nav Link Styling */
        .sidebar .nav-link {
            border-radius: 0;
            padding: 12px 20px;
            color: #555;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            text-decoration: none;
        }
        .sidebar .nav-link:hover {
            background-color: #f8f9fa;
            color: #14756E;
        }
        .sidebar .nav-link.active {
            background-color: #f0fffe;
            color: #14756E;
            border-left-color: #14756E;
            font-weight: 600;
        }
        .sidebar .nav-link i {
            width: 25px;
            margin-right: 10px;
            flex-shrink: 0;
        }
        .sidebar .nav-link span {
            flex: 1;
            white-space: nowrap;
            overflow: visible;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            transition: transform 0.3s ease;
        }
        
        /* Navbar Admin */
        .admin-navbar {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-radius: 12px;
        }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-primary">CV Dinamika Admin</div>
            <?= $this->include('admin/layout-admin/sidebar') ?>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid px-4">
                
                <!-- Admin Navbar -->
                <nav class="admin-navbar">
                    <button class="btn btn-outline-primary btn-sm" id="menu-toggle">
                        <i class="fas fa-bars"></i> Menu
                    </button>
                    
                    <div class="d-flex align-items-center">
                        <span class="me-3 d-none d-md-block text-muted">Halo, <strong><?= session()->get('user_name') ?? 'Admin' ?></strong></span>
                        <a href="/logout" class="btn btn-sm btn-danger rounded-pill px-3">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    </div>
                </nav>

                <!-- Alerts -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Page Title -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark mb-0"><?= $page_title ?? 'Dashboard' ?></h2>
                </div>

                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <!-- Use local Bootstrap JS from public/js -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script>
        // Toggle Sidebar Script
        var menuToggle = document.getElementById("menu-toggle");
        var wrapper = document.getElementById("wrapper");
        
        menuToggle.addEventListener("click", function(e) {
            e.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>