<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>The BGV Luxury Hotel</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow&amp;family=Barlow+Condensed&amp;family=Gilda+Display&amp;display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=EB+Garamond&family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/plugins.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/clockpicker.css" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <!-- Tailwind JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/forms@0.3.3/dist/forms.min.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LCJVJD2892"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LCJVJD2892');
    </script>

</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div> -->
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="logo" href="index.php?act=home">
                    <h2>THE BGV<span>Luxury Hotel</span></h2>
                </a>
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?act=home">Trang chủ</a></li>

                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Phòng & Căn hộ
                            <i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?act=list-room" class="dropdown-item"><span>Tất cả</span></a></li>
                            <?php foreach ($loaiphong as $lp) : ?>
                                <?php
                                extract($lp);
                                $linklp = "index.php?act=room&idlp=" . $id;
                                ?>
                                <li><a href="<?= $linklp ?>" class="dropdown-item"><span><?= $name ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="index.php?act=restaurant" role="button" data-bs-auto-close="outside" aria-expanded="false">Nhà hàng<i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?act=spa" class="dropdown-item"><span>Spa</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="index.php?act=facilities" role="button" data-bs-auto-close="outside" aria-expanded="false">Tiện ích<i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?act=services" class="dropdown-item"><span>Dịch vụ</span></a></li>
                            <li><a href="index.php?act=gallery" class="dropdown-item"><span>Phòng trưng bày</span></a></li>
                            <li><a href="index.php?act=team" class="dropdown-item"><span>Team</span></a></li>
                            <li><a href="index.php?act=pricing" class="dropdown-item"><span>Giá cả</span></a></li>
                            <li><a href="index.php?act=careers" class="dropdown-item"><span>Tuyển dụng</span></a></li>
                            <li><a href="index.php?act=faq" class="dropdown-item"><span>F.A.Qs</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="index.php?act=news" role="button" data-bs-auto-close="outside" aria-expanded="false">Tin tức<i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?act=contact" class="dropdown-item"><span>Liên hệ</span></a></li>
                            <li><a class="dropdown-item" href="index.php?act=about">Về chúng tôi</a></li>
                        </ul>
                    </li>
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    ?>
                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-auto-close="outside" aria-expanded="false">Xin chào, <?= $name ?> <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?act=my-bill" class="dropdown-item"><span>Đơn đặt của tôi</span></a></li>
                                <li><a href="index.php?act=bill" class="dropdown-item"><span>Danh sách phòng đặt</span></a></li>
                                <li><a href="index.php?act=forgot-pass" class="dropdown-item"><span>Quên mật khẩu</span></a></li>
                                <li><a href="index.php?act=edit-account" class="dropdown-item"><span>Cập nhật tài khoản</span></a></li>
                                <?php if ($role != 0) : ?>
                                    <li><a href="admin/index.php" class="dropdown-item"><span>Đăng nhập Admin</span></a></li>
                                <?php endif; ?>
                                <li><a href="index.php?act=log-out" class="dropdown-item"><span>Thoát</span></a></li>
                            </ul>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="index.php?act=sign-in" role="button" data-bs-auto-close="outside" aria-expanded="false">Đăng nhập<i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?act=sign-up" class="dropdown-item"><span>Đăng kí</span></a></li>
                                <li><a href="index.php?act=forgot-pass" class="dropdown-item"><span>Quên mật khẩu</span></a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>