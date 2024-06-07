<link rel="stylesheet" href="view/css/payment/payment.css">
<article id="article">
    <div class="payMent-container">
        <div class="title-payments">
            <div class="title-payment">
                <div class="circle">1</div>
                <h1 style="color: #006ba6">Thông tin người đặt</h1>
            </div>
            <div class="triangle-right"></div>
            <div class="title-payment">
                <div class="circle">2</div>
                <h1>Thông tin đơn hàng</h1>
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
                    THÔNG TIN NGƯỜI ĐẶT
                </div>
                <div class="attention">
                    <h1>Lưu ý <strong>*</strong> :</h1> <br>
                    <p>Bạn có thể cập nhập thông tin phía dưới để phù hợp với điều kiện nhận hàng (hoặc không).</p>
                </div>
                <form action="index.php?act=updateAccount2" method="post" class="form-input">
                    <?php
                        extract($_SESSION['user']);
                    ?>
                    <div class="form-flex">
                        <div class="info-user">
                            <div class="input-group">
                                <label class="label">Email*</label>
                                <input autocomplete="off" name="email" class="input" type="email" value="<?=$email?>">
                            </div>

                            <div class="input-group">
                                <label class="label">Họ*</label>
                                <input autocomplete="off" name="firstName" class="input" type="text" value="<?=$firstName?>">
                            </div>

                            <div class="input-group">
                                <label class="label">Tên*</label>
                                <input autocomplete="off" name="lastName" class="input" type="text" value="<?=$lastName?>">
                            </div>

                        </div>
                        <div class="content-user">
                            <div class="input-group">
                                <label class="label">Số điện thoại*</label>
                                <input autocomplete="off" name="phoneNumber" class="input" type="number" value="<?=$phoneNumber?>">
                            </div>
        
                            <div class="input-group">
                                <label class="label">Địa chỉ*</label>
                                <input autocomplete="off" name="adr" class="input" type="text" value="<?=$adr?>">
                            </div>
                            <div class="btn-container">
                                <button name="btn-update">CẬP NHẬT THÔNG TIN</button>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if(isset($thongbao)) {
                            echo $thongbao;
                        }
                    ?>
                    
                </form>
            </div>
        </div>
        <div class="step-2">
            <a href="index.php?act=payMent2">Xem đơn hàng <i class="fa-solid fa-arrow-right animation"></i></a>
        </div>
    </div>
</article>