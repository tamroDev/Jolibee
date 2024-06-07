<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jolibee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="view/images/logo.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./view/css/header.css">
    <link rel="stylesheet" href="./view/css/slide.css">
    <link rel="stylesheet" href="./view/css/home.css">
    <link rel="stylesheet" href="./view/css/footer.css">
    <link rel="stylesheet" href="./view/css/login/register.css">
    <link rel="stylesheet" href="./view/css/reponsize/reponsize.css">
</head>
<body>
    <div id="container">
        <header id="header">
                <div class="top-header">
                    <div class="header-top-item">
                        <img src="view/images/img-topHeader.png" alt="">
                        <div class="location">
                            <i class="fa-solid fa-location-dot"></i>
                            <a style="text-decoration: none; color:black" target="#" href="https://www.google.com/maps/place/63+Thi+S%C3%A1ch,+H%C3%B2a+Thu%E1%BA%ADn+Nam,+H%E1%BA%A3i+Ch%C3%A2u,+%C4%90%C3%A0+N%E1%BA%B5ng+550000,+Vi%E1%BB%87t+Nam/@16.0529,108.2031247,17z/data=!3m1!4b1!4m6!3m5!1s0x314219ba665607ad:0xee5bb4e1622fa43d!8m2!3d16.0528949!4d108.2056996!16s%2Fg%2F11sp94rk6j?entry=ttu">
                                <span>63 Thi Sách</span>
                            </a>
                        </div>
                        <?php 
                            if (isset($_SESSION['user'])) {
                                echo '<div class="log">
                                        <a href="index.php?act=cartFollow">
                                        <i class="fa-solid fa-user"></i>
                                        </a>
                                        <a class="name" href="index.php?act=cartFollow">
                                        Chào bạn '.$_SESSION['user']['lastName'].'
                                        </a>
                                        <div class="line"></div>
                                        <a href="index.php?act=logOut">Đăng xuất</a>
                                    </div>';
                            }else {
                                echo '<div class="log">
                                <i class="fa-solid fa-user"></i>
                                <a class="openLogin" href="#">Đăng nhập</a>
                                <div class="line"></div>
                                <a href="index.php?act=register">Đăng ký</a>
                            </div>';
                            }
                        ?>
                        
                            
                    </div>

                </div>
                <div class="content-header">
                    <div class="logo">
                        <a href="index.php"><img src="view/images/logo.png" alt=""></a>
                    </div>
                    <nav class="menu">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php?act=viewMenu">Thực đơn</a></li>
                            <li><a href="index.php?act=discount">Khuyến mãi</a></li>
                            <li><a href="index.php?act=service">Dịch vụ</a></li>
                            <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                            <li><a href="index.php?act=about">Về chúng tôi</a></li>
                        </ul>
                    </nav>
                    <div class="hotline">
                        <a href=""><img src="view/images/hotline.png" alt=""></a>
                    </div>
                </div>
                <div class="login-container">
                    <div class="login-form">
                        <div class="form-container" style = "margin-bottom:0">
                            <div class="form-title">
                                <h1>Đăng nhập tài khoản</h1>
                            </div>
                            <form action="index.php?act=login" method="post" class="form-input">
                                <div class="input-group">
                                    <label class="label">Email*</label>
                                    <input required autocomplete="off" name="email" id="Email" class="input" type="email">
                                </div>

                                <div class="input-group">
                                    <label class="label">Mật khẩu*</label>
                                    <input required autocomplete="off" name="password" id="password" class="input" type="password">
                                </div>
                                <?php 
                                    if(isset($thongbao)) {
                                        echo $thongbao;
                                    }
                                ?>
                                <div class="btn-container">
                                    <button name="btn-login">ĐĂNG NHẬP</button>
                                    <span>Bạn chưa có tài khoản ? <a href="index.php?act=register">Đăng ký</a></span>
                                </div>
                            </form>    
                        </div>
                        <div class="icon-close">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </div>
                    </div>
                </div>


                <div class="menu-rp-container">
                    <div class="menu-rp">
                        <div class="header-item-rp">
                            <i class="fa-solid fa-bars menu-toggle"></i>
                        </div>
                        <ul class="menu-item-rp">
                            <li class="menu-item">
                                <a href="#" class="menu-link">Trang chủ</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">Thực đơn</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">Khuyến mãi</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">Dịch vụ</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">Liên Hệ</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">Về Chúng tôi</a>
                            </li>
                        </ul>
                    </div>

                    <div class="logo-rp">
                        <a class="logo-link" href="index.php"><img src="view/images/logo.png" alt=""></a>
                    </div>

                    <div class="user-rp">
                        <div class="header-item-rp-2">
                            <i class="fa-solid fa-user user-toggle"></i>
                        </div>
                        <ul class="user-item-rp">
                            <li class="menu-item">
                                <a href="#" class="menu-link">Đăng ký</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link openLogin">Đăng Nhập</a>
                            </li>
                            <li class="menu-item">
                                    <a class="menu-link" target="#" href="https://www.google.com/maps/place/63+Thi+S%C3%A1ch,+H%C3%B2a+Thu%E1%BA%ADn+Nam,+H%E1%BA%A3i+Ch%C3%A2u,+%C4%90%C3%A0+N%E1%BA%B5ng+550000,+Vi%E1%BB%87t+Nam/@16.0529,108.2031247,17z/data=!3m1!4b1!4m6!3m5!1s0x314219ba665607ad:0xee5bb4e1622fa43d!8m2!3d16.0528949!4d108.2056996!16s%2Fg%2F11sp94rk6j?entry=ttu">
                                        <span>63 Thi Sách</span>
                                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <script src="view/js/headerRP.js"></script>
        </header>
