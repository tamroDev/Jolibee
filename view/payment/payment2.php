<link rel="stylesheet" href="view/css/payment/payment.css">
<link rel="stylesheet" href="view/css/payment/paymentCheck.css">
<style>
.checkbox-wrapper-18 .round {
position: relative;
}

.checkbox-wrapper-18 .round label {
background-color: #fff;
border: 1px solid #ccc;
border-radius: 50%;
cursor: pointer;
height: 28px;
width: 28px;
display: block;
}

.checkbox-wrapper-18 .round label:after {
border: 2px solid #fff;
border-top: none;
border-right: none;
content: "";
height: 6px;
left: 8px;
opacity: 0;
position: absolute;
top: 9px;
transform: rotate(-45deg);
width: 12px;
}

.checkbox-wrapper-18 .round input[type="checkbox"] {
visibility: hidden;
display: none;
opacity: 0;
}

.checkbox-wrapper-18 .round input[type="checkbox"]:checked + label {
background-color: #66bb6a;
border-color: #66bb6a;
}

.checkbox-wrapper-18 .round input[type="checkbox"]:checked + label:after {
opacity: 1;
}
</style>
<article id="article">
    <div class="payMent-container">
        <div class="title-payments">
            <div class="title-payment">
                <div class="circle">1</div>
                <h1 >Thông tin người đặt</h1>
            </div>
            <div class="triangle-right"></div>
            <div class="title-payment">
                <div class="circle">2</div>
                <h1 style="color: #006ba6">Thông tin đơn hàng</h1>
            </div>
            <div class="triangle-right"></div>
            <div class="title-payment">
                <div class="circle">3</div>
                <h1>Hoàn Tất đơn hàng</h1>
            </div>
        </div>
        <div class="form-user">
            <div class="form-container">
                <div class="title-form">
                    THÔNG TIN ĐƠN HÀNG
                </div>

                <div style="padding: 10px;" class="payMethod-container">
                    <form action="index.php?act=addToOrder" method="post" class="form-content">
                            <div class="boxContent">
                                <div class="content-payMethod">
                                    <div class="title-payMethod">
                                        PHƯƠNG THỨC THANH TOÁN
                                    </div>
                                    <div class="form-method">
                                    <div class="attention">
                                        <h1>Lưu ý <strong>*</strong> :</h1> <br>
                                        <p>Bạn nên kiểm tra kỹ lại món ăn đã đặt để tránh trường hợp nhầm món <br> (Bỏ qua nếu đã chắc chắn).</p>
                                    </div>
                                    <div class="accordion-container">
                                        <div class="accordion"> 
                                            <div class="accordion-header" onclick="toggleCheckbox('checkbox-18')">
                                                <div class="checkbox-wrapper-18">
                                                    <div class="round">
                                                        <input name="thanhtoankhinhan" value="thanhtoankhinhan" type="checkbox" class="checkbox" id="checkbox-18" />
                                                        <label for="checkbox-18"></label>
                                                    </div>
                                                </div>
                                                <span>Thanh toán khi nhận hàng</span>
                                                <i class="fa fa-angle-down icon"></i>
                                            </div>
                                            <div class="accordion-content">
                                                <div class="accordion-content-inner">
                                                    Chúng tôi sẽ gọi điện để xác nhận đơn hàng của bạn trong thời gian ngắn nhất để chắc chắn hành động này
                                                    không phải là nhầm lẫn.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordion-header" onclick="toggleCheckbox('checkbox-17')">
                                                <div class="checkbox-wrapper-18">
                                                    <div class="round">
                                                        <input name="banking" value="banking" type="checkbox" class="checkbox" id="checkbox-17" />
                                                        <label for="checkbox-17"></label>
                                                    </div>
                                                </div>
                                                <span>Chuyển khoản ngân hàng</span>
                                                <i class="fa fa-angle-down icon"></i>
                                            </div>
                                            <div class="accordion-content ">
                                                <div class="accordion-content-inner">
                                                    <h1>Tên người nhận: Lê Nguyễn Bảo Tâm</h1>
                                                    <h1>STK: 0906487673</h1>
                                                    <h1>Ngân hàng: MB-Bank</h1>
                                                    <img src="view/images/banking.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            .notifacion {
                                                text-align: center;
                                                color: red;
                                                font-weight: 600;
                                            }
                                        </style>
                                        <div class="notifacion">
                                            <?php 
                                                if(isset($thongbao)) {
                                                    echo $thongbao;
                                                }else {
                                                    echo '';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-container">
                                <div class="cart-postion">
                                    <div class="title-payMethod">
                                        Chi tiết đơn hàng <br>
                                    </div>
                                    <div class="cart">
                                        <?php 
                                        if (isset($_SESSION['user'])) {
                                            $iduser = $_SESSION['user']['id'];
                                            $list_Cart = load_Cart ($iduser);
                                            $totalCart = 0;
                                            foreach ($list_Cart as $cart) {
                                                extract($cart);
                                                $remove = "index.php?act=removeCart2&id=".$id;
                                                $id = $idProduct;
                                                $product = loadOne_product ($id);
                                                extract($product);
                                                $newPrice = 0;
                                                if($saleProduct > 0) {
                                                    $newPrice = $priceSale;
                                                    $totalProduct = $newPrice * $quantity;
                                                    $totalCart += $totalProduct;
                                                }else {
                                                    $newPrice = $pricePD;
                                                    $totalProduct = $newPrice * $quantity;
                                                    $totalCart += $totalProduct;
                                                }
                                                $img = $img_path.$img;
                                                
                                                if(isset($cart)) {
                                                    echo '
                                                    <div class="cart-item">
                                                        <div class="img-info">
                                                            <img src="'.$img.'" alt="">
                                                        </div>
                                                        <div class="product-content">
                                                            <h2>'.$namePD.'</h2>
                                                            <div class="text-content priceDot">
                                                                <div>
                                                                    <strong>Số Lượng:</strong> '.$quantity.'                                            
                                                                </div>
                                                                <div>
                                                                    <strong>Đơn giá:</strong><span>'.$newPrice.'</span>                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="close-icon">
                                                            <a href="'.$remove.'"><i class="fa-solid fa-xmark"></i></a>
                                                        </div>
                                                        <input type="hidden" name="img[]" value="'.$img.'">
                                                        <input type="hidden" name="namePD[]" value="'.$namePD.'">
                                                        <input type="hidden" name="pricePD[]" value="'.$newPrice.'">
                                                        <input type="hidden" value="'.$quantity.'" name="quantity[]">
                                                    </div>
                                                    ';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div style="border-top: 2px dashed black; margin-top:3px ; border-bottom :none; margin-bottom:0;" class="title-payMethod">
                                        <?php
                                            if (isset($_SESSION['user'])) {
                                                echo '<div class="priceDot">
                                                        <p>Tổng Đơn:<span>'.$totalCart.'</span></p>
                                                    </div>';
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="stepBox">
                                    <div class="step-2">
                                        <button name="btn-pay" >Thanh toán đơn hàng <i class="fa-solid fa-arrow-right animation"></i></button>
                                    </div>
                                    <div class="step-2">
                                        <a href="index.php?act=payMent"><i style="padding-right: 10px;" class="fa-solid fa-arrow-left animation"></i></i>Quay Lại</i></a>
                                    </div>
                                </div>
                                <input type="hidden" name="totalPrice" value="<?=$totalCart?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>
<script src="view/js/price.js"></script>
<script src="view/js/payment.js"></script>