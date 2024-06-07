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
                    <li><a href="#"><i class="fa-solid fa-bag-shopping"></i>THEO DÕI ĐƠN HÀNG.</a></li>
                    
                    <li><a href="index.php?act=feedbackFollow"><i class="fa-solid fa-comment"></i>PHẢN HỒI</a></li>
                    <?php 
                        if($_SESSION['user']['role'] == "Admin" || $_SESSION['user']['role'] == "NhanVien" ) {
                            echo '<li><a href="index.php?act=loginAdmin"><i class="fa-solid fa-toolbox"></i>VÀO TRANG QUẢN TRỊ.</a></li>';
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
                    foreach ($orders as $order) {
                        extract($order);
                        if ($statusOrder == 0 ) {
                            $statusOrder = "Đang chờ";
                        }
                        if ($statusOrder == 1 ) {
                            $statusOrder = "Đang giao";
                        }
                        if ($statusOrder == 2) {
                            $statusOrder = "Hoàn Thành";
                        }
                        if ($payMethod == "momo") {
                            $payMethod = "Momo";
                        }
                        if ($payMethod == "thanhtoankhinhan") {
                            $payMethod = "Thanh toán khi nhận hàng";
                        }
                        if ($payMethod == "vidientu") {
                            $payMethod = "Ví điện tử";
                        }
                        $detail = "index.php?act=order_details&order_id=".$id;
                        $order_delete = "index.php?act=order_delete&order_id=".$id;
                        echo '<li>
                                <div class="order">
                                    <table>
                                        <tr>
                                            <th>Đơn hàng số</th>
                                            <th>Tổng đơn</th>
                                            <th>Ngày đặt</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng Thái</th>
                                            <th>Xem đơn</th>
                                        </tr>
                                        <tr>
                                            <td>#BAOTAM'.$id.'</td>
                                            <td class="priceDot"><span>'.$total_amount.'</span></td>
                                            <td>'.$order_date.'</td>
                                            <td>'.$payMethod.'</td>
                                            <td class="statusOD">'.$statusOrder.'</td>
                                            <td>
                                                <a href="'.$detail.'">Chi tiết</a>
                                                <a class="cancel" href="'.$order_delete.'">Hủy Đơn</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </li>';
                    }
                ?>
                </ul>
                <div class="modal-container">
                    <div class="modal">
                        <div class="title-modal">
                            Chú Ý
                        </div>
                        <div class="content-modal">
                            Khi đơn hàng đang ở trạng thái "<h2>GIAO HÀNG</h2>" bạn không thể hủy đơn hàng.
                            <h3>Xin cảm ơn.</h3>
                        </div>
                        <div class="action-modal">
                            <a href="index.php?act=lienhe">Liên Hệ Người Bán</a>
                            <a class="cancelModal" href="#">Hủy</a>
                        </div>
                        <div class="outModal">
                            x
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<style>
    .priceDot {
        color: #e31837;
        font-weight: 600;
    }
</style>
<script src="view/js/price.js"></script>
<script src="view/js/modal.js"></script>