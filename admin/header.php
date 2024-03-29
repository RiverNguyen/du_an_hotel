<?php
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>The BGV Luxury Hotel</title>
    <link rel="shortcut icon" href="../img/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow&amp;family=Barlow+Condensed&amp;family=Gilda+Display&amp;display=swap">
    <link rel="stylesheet" href="../css/plugins.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/more-css.css">
    <link rel="stylesheet" href="../css/oc.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <!-- Tailwind JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/forms@0.3.3/dist/forms.min.js"></script>
</head>

<body>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="logo" href="../index.php">
                    <h2>THE BGV<span>Luxury Hotel</span></h2>
                </a>
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
            <!-- Menu -->
            <?php if ($role == 1) : ?>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php?act=home">Trang chủ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?act=addlp" role="button" data-bs-auto-close="outside" aria-expanded="false">Loại Phòng
                                <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?act=addp" class="dropdown-item"><span>Phòng</span></a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?act=adddv" role="button" data-bs-auto-close="outside" aria-expanded="false">Dịch vụ
                                <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?act=addti" class="dropdown-item"><span>Tiện ích</span></a></li>
                                <li><a href="index.php?act=addgc" class="dropdown-item"><span>Giá cả</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?act=list-account" role="button" data-bs-auto-close="outside" aria-expanded="false">Khách hàng
                                <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?act=list-comment" class="dropdown-item"><span>Bình Luận</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=list-bill">Booking</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=thongke">Thống kê</a></li>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if ($role == 2) : ?>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php?act=home">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=list-bill">Booking</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=thongke">Thống kê</a></li>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if ($role == 3) : ?>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php?act=home">Trang chủ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?act=addlp" role="button" data-bs-auto-close="outside" aria-expanded="false">Loại Phòng
                                <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?act=addp" class="dropdown-item"><span>Phòng</span></a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?act=adddv" role="button" data-bs-auto-close="outside" aria-expanded="false">Dịch vụ
                                <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?act=addti" class="dropdown-item"><span>Tiện ích</span></a></li>
                                <li><a href="index.php?act=addgc" class="dropdown-item"><span>Giá cả</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=list-bill">Booking</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </nav>