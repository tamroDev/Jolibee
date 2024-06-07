<link rel="stylesheet" href="view/css/cartFollow/cartFollow.css">
<style>
    .control-bar ul li:nth-child(2) {
        background-color: #635f5f;
    }

    .control-bar ul li:nth-child(2) a {
        color: white;
    }
</style>
<article id="article">
    <div class="account-setting">
        <div class="title-account">
            <i class="fa-solid fa-gear"></i>account-setting:
        </div>
        <div class="content-account">
            <div class="control-bar">
                <ul>
                    <li><a href="index.php?act=updateUser"><i class="fa-solid fa-pen"></i>CẬP NHẬP TÀI KHOẢN.</a></li>
                    <li><a href="index.php?act=cartFollow"><i class="fa-solid fa-bag-shopping"></i>THEO DÕI ĐƠN HÀNG.</a></li>
                    <li><a href="index.php?act=feedbackFollow"><i class="fa-solid fa-comment"></i>PHẢN HỒI</a></li>
                    <?php 
                        if($_SESSION['user']['role'] == "Admin" || $_SESSION['user']['role'] == "NhanVien" ) {
                            echo '<li><a href="index.php?act=showUser"><i class="fa-solid fa-toolbox"></i>VÀO TRANG QUẢN TRỊ.</a></li>';
                        } else {
                            echo '';
                        }
                    ?>
                    <li><a href=""><i class="fa-solid fa-circle-info"></i>KHÁC.</a></li>
                    <li><a href="index.php?act=logOut"><i class="fa-solid fa-right-from-bracket"></i>ĐĂNG XUẤT.</a></li>
                </ul>
            </div>
            <div class="content-control">
                <div class="title-control">
                    Đơn hàng của bạn
                </div>
                <ul>
                    <?php
                        foreach ($details as $detail) {
                            extract($detail);
                            $detail = "index.php?act=order_details&order_id=".$id;

                            echo '<li>
                                    <div class="order">
                                        <div class="order_img">
                                            <img src="'.$img.'" alt="">
                                        </div>
                                        <div class="order-content">
                                            <div class="order-name">
                                                '.$product_name.'
                                            </div>
                                            <div class="order-number">
                                                <div class="order-quantity">
                                                    Số lượng:<span>'.$quantity.'</span>
                                                </div>
                                                <div class="order-price priceDot">
                                                    Đơn giá:<span>'.$price.'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>';
                        }
                    ?>
                </ul>
                <style>
                    .content-control li {
                        border-bottom: 2px solid black;
                        padding-bottom: 20px;
                    }

                    li:last-child {
                        border: none;
                    }
                    
                    .order {
                        justify-content: flex-start;
                        gap: 200px;
                    }

                    .order_img img {
                        max-height: 268px;
                        max-width: 268px;
                    }

                    .order-content {
                        border-left: 2px solid black;
                        padding-left: 40px;
                    }

                    .order-name {
                        margin-bottom: 40px;
                        color: black;
                        font-weight: 500;
                    }

                    .order-number {
                        margin-bottom: 40px;
                    }

                    .order-quantity ,.order-price  {
                        color: black;
                        margin-bottom: 10px;
                        font-weight: 500;
                    }

                    .order-price span , .order-quantity span {
                        color: #e31837;
                        margin-left: 20px;
                    }
                </style>
                <script>
                    const statusOrder =document.querySelectorAll("tr td:nth-child(5)")

                    statusOrder.forEach( function (item) {
                        console.log(item.textContent)
                        if(item.textContent == "Hoàn Thành") {
                            item.style.color = "green";
                        }
                        if(item.textContent == "Đang giao") {
                            item.style.color = "#ffc522";
                        }
                        if(item.textContent == "Hoàn Thành") {
                            item.style.color = "green";
                        }
                        if(item.textContent == "Đang chờ") {
                            item.style.color = "red";
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</article>
<script src="view/js/price.js"></script>