<link rel="stylesheet" href="view/css/serviceUser/serviceUser.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik+Bubbles&display=swap');
    .title-form {
        font-family: 'Rubik Bubbles';
        color: #e31837;
        font-size: 30px;
        margin-bottom: 30px;
    }
    .input-group {
        margin-bottom: 10px;
    }

    .notifacion {
        color: #eb002f;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 800;
        margin-top: 30px;
        text-align: center;
    }
</style>
<article id="article">
    <div class="container-function">
        <div class="list-function">
            <div class="form-container">
                <div class="title-form">
                    Password Update
                </div>
                <form action="index.php?act=updatePass" method="post" class="form-input">
                    <div class="update-content">
                        <div class="input-box">
                            <div class="input-group">
                                <label class="label">Mật khẩu cũ*</label>
                                <input required autocomplete="off" name="oldPass" class="input" type="password" value="">
                            </div>

                            <div class="input-group">
                                <label class="label">Mật khẩu mới*</label>
                                <input required autocomplete="off" name="newPass" class="input" type="password" value="">
                            </div>

                            <div class="input-group">
                                <label class="label">Xác nhận mật khẩu*</label>
                                <input required autocomplete="off" name="confirmPass" class="input" type="password" value="">
                            </div>
                        </div>
                    </div>
                    <h1 class="notifacion">
                        <?php 
                            if(isset($thongBao)) {
                                echo $thongBao;
                            }
                        ?>
                    </h1>
                    <div class="btn-container">
                        <button name="btn-update">XÁC NHẬN</button>
                        <span><a href="index.php?act=updateAccount" >Quay Về</a></span>
                    </div>
                </form>
            </div>
            <script>
                const noti =document.querySelector(".notifacion");
                const content =noti.textContent;
                if(content.trim() == 'Đổi mật khẩu thành công') {
                    noti.style.color = "green";
                }
            </script>
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