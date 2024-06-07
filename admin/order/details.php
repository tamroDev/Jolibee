<link rel="stylesheet" href="../view/css/payment/payment.css">
<link rel="stylesheet" href="../view/css/order/order.css">
    <div class="right">
        <div class="payMent-container">
            <div class="form-user">
                <div class="form-container">
                    <div class="title-form">
                        THÔNG TIN ĐƠN HÀNG
                    </div>
                    <div style="padding: 10px;" class="payMethod-container">
                        <form action="index.php?act=addToOrder" method="post" class="form-content">
                            <div class="boxContent">
                                <div class="cart-container">
                                    <div class="title-payMethod">
                                        Chi tiết đơn hàng: <span style="color: #e31837;"> <?=$order_id?><br></span>
                                    </div>
                                    <div class="cart">
                                        <?php 

                                            foreach ($details as $detail) {
                                                extract($detail);
                                                echo '
                                                <div class="cart-item">
                                                    <div class="img-info">
                                                        <img src="../'.$img.'" alt="">
                                                    </div>
                                                    <div class="product-content">
                                                        <h2>'.$product_name.'</h2>
                                                        <div class="text-content priceDot">
                                                            <div>
                                                                <strong>Số Lượng:</strong> '.$quantity.'                                            
                                                            </div>
                                                            <div>
                                                                <strong>Đơn giá:</strong><span>'.$price.' VNĐ</span>                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="back">
                <a href="index.php?act=showOrder">Xem đơn hàng</a>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
</body>
</html>