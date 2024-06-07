<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../view/css/admin.css">
    <link rel="stylesheet" href="../view/css/table.css">
    <link rel="stylesheet" href="../view/css/category/category.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        .swal2-container  {
            overflow-y: auto;
            margin: auto;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 280px;
            background: rgba(255, 255, 255, 0) !important ;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="logo" style = "padding-right:20px">
                <img src="../view/images/logo.png" alt="">
            </div>
            <div class="openMenu">
                <i class="fa-solid fa-bars open"></i>
            </div>
            <div class="container-left">
                <div class="item">
                    <div class="user">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="category">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <div class="product">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <div class="cart-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="cart-icon">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <div class="chart">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    <div class="clone">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                </div>
                <div class="item">
                    <div class="user">
                        <a href="index.php?act=showUser">Tài khoản</a>
                    </div>
                    <div class="category">
                        <a href="index.php?act=category">Danh mục</a>
                    </div>
                    <div class="product">
                        <a href="index.php?act=products">Sản phẩm</a>
                    </div>
                    <div class="cart-icon">
                        <a href="index.php?act=showOrder">Đơn hàng</a>
                    </div>
                    <div class="cart-icon">
                        <a href="index.php?act=showFeedback">Phản Hồi</a>
                    </div>
                    <div class="chart">
                        <a href="index.php?act=showChart">Thống kê</a>
                    </div>
                    <div class="clone">
                        <a href="index.php?act=backHome">Về trang chính</a>
                    </div>
                </div>
            </div>
            <script>
                const openMenu = document.querySelector(".open");
                const left = document.querySelector(".left");
                const item2 = document.querySelector(".left .item:nth-child(2)");
                const item1 = document.querySelector(".left .item:nth-child(1)");
    
                openMenu.addEventListener("click", () => {
                    left.classList.toggle("openWidth");
                    item2.classList.toggle("hidden");
                });

                item1.addEventListener("click", () => {
                    left.classList.add("openWidth");
                    item2.classList.add("hidden");

                    
                });

                document.addEventListener("click" , (e) => {
                    if(!left.contains(e.target)) {
                        left.classList.remove("openWidth");
                        item2.classList.remove("hidden");
                    }
                })

            </script>
        </div>
        