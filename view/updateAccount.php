<link rel="stylesheet" href="view/css/serviceUser/serviceUser.css">
<article id="article">
    <div class="container-function">
        <div class="list-function">
        <div class="title-account">
            <i class="fa-solid fa-gear" aria-hidden="true"></i>account-setting:
        </div>
        <div class="notification">
            <style>
                .notification {
                    width: 100%;
                    text-transform: uppercase;
                    text-align: center;
                    font-size: 30px;
                    font-weight: 700;
                    color: chartreuse;
                }
                .title-account {
                    color: #e31837;
                    font-weight: 800;
                    text-transform: uppercase;
                    border-bottom: 3px solid black;
                    font-size: 30px;
                    padding-left: 20px;
                    padding-bottom: 15px;
                    width: 100%;
                }

                .title-account i {
                    margin-right: 10px;
                }
            </style>
            <?php 
                if(isset($notification)) {
                    echo $notification;
                } else {
                    echo "";
                }
            ?>
        </div>
        <div class="form-container">
            <form action="index.php?act=updateAccount" method="post" class="form-input" enctype="multipart/form-data">
                <?php
                    extract($_SESSION['user']);
                    $img = $img_path.$_SESSION['user']['imgUser'];
                ?>
                <div class="update-content">
                    <div class="input-box">
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

                        <div class="input-group">
                            <label class="label">Số điện thoại*</label>
                            <input autocomplete="off" name="phoneNumber" class="input" type="number" value="<?=$phoneNumber?>">
                        </div>

                        <div class="input-group">
                            <label class="label">Địa chỉ*</label>
                            <input autocomplete="off" name="adr" class="input" type="text" value="<?=$adr?>">
                        </div>
                    </div>
                    <div class="img-update">
                        <div class="title-img">
                            Thêm ảnh
                        </div>
                        <img src="<?=$img?>" alt="">
                        <div class="button-wrapper">
                            <span class="label">
                                Upload File
                            </span>
                            <input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File">
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($thongbao)) {
                        echo $thongbao;
                    }
                ?>

                <div class="btn-container">
                    <button name="btn-update">XÁC NHẬN</button>
                    <span class="unlock"><a class="updatePass" href="index.php?act=updatePassword" >Đổi mật khẩu <i class="fa-solid fa-lock"></i></a></span>
                    <br>
                    <span><a href="index.php?act=cartFollow" >Quay Về</a></span>
                </div>
            </form>
            <script>
                const unlock =document.querySelector('.unlock');
                const iconlock =document.querySelector('.unlock a i');
                console.log(iconlock);
                unlock.addEventListener("mouseover", () => {
                    iconlock.classList.toggle("fa-lock");
                    iconlock.classList.toggle("fa-lock-open");
                })
                unlock.addEventListener("mouseout", () => {
                    iconlock.classList.toggle("fa-lock");
                    iconlock.classList.toggle("fa-lock-open");
                })
            </script>
        </div>
            <style>
                .form-title {
                    width: 100%;
                    text-align: center;
                }
                .form-container {
                    width: 100%;
                    margin-bottom: 50px;
                    padding: 15px;
                }


            </style>
        </div>
    </div>
</article>