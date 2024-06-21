
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Admin HotCoffee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="../assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/layout.js"></script>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="layout-wrapper">
        <?php if (isset($_SESSION['email'])) : ?>
            <header id="page-topbar">
                <div class="layout-width">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <div class="navbar-brand-box horizontal-logo">
                                <a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="../images/logo.png" alt="" height="22">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../images/logo.png" alt="" height="17">
                                    </span>
                                </a>
                                <a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="../images/logo.png" alt="" height="22">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../images/logo.png" alt="" height="17">
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="dropdown d-md-none topbar-head-dropdown header-item">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-search fs-22"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="dropdown ms-1 topbar-head-dropdown header-item">
                                <div class="dropdown ms-sm-3 header-item topbar-user">
                                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-flex align-items-center">

                                            <img class="rounded-circle header-profile-user" src="../images/<?php echo $_SESSION['img'] ?>" alt="Header Avatar">
                                            <span class="text-start ms-xl-2">
                                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $_SESSION['user'] ?></span>
                                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Founder</span>
                                            </span>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <h6 class="dropdown-header">Welcome Admin!</h6>
                                        <a class="dropdown-item" href="index.php?act=logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Logout</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="app-menu navbar-menu">
                <div class="navbar-brand-box">
                    <a href="index.php" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="../images/logo.png" alt="" height="">
                        </span>
                        <span class="logo-lg">
                            <img src="../images/logo.png" alt="" height="">
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>
                <div id="scrollbar">
                    <div class="container-fluid">
                        <div id="two-column-menu"></div>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#HotCoffee" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Quản lý HotCoffee</span>
                                </a>
                                <div class="collapse menu-dropdown" id="HotCoffee">
                                    <ul class="nav nav-sm flex-column">
                                        <li><a href="../index.php" class="nav-link" data-key="t-analytics">Trang chủ</a></li>
                                        <li><a href="index.php?act=adddm" class="nav-link" data-key="t-analytics">Danh mục</a></li>
                                        <li><a href="index.php?act=addsp" class="nav-link" data-key="t-analytics">Sản phẩm</a></li>
                                        <li><a href="index.php?act=dskh" class="nav-link" data-key="t-analytics">Khách hàng</a></li>
                                        <li><a href="index.php?act=dsdh" class="nav-link" data-key="t-analytics">Đơn hàng</a></li>
                                        <li><a href="index.php?act=dsbl" class="nav-link" data-key="t-analytics">Bình luận</a></li>
                                        <li><a href="index.php?act=thongke" class="nav-link" data-key="t-analytics">Thống kê</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-background"></div>
            </div>
        <?php endif; ?>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->

                <!-- end page title -->