<link rel="stylesheet" href="view/css/login/register.css">
<style>
    .thongBao {
        color: red;
        font-size: 20px;
        margin: 10px 0 50px 0;
        font-weight: 700;
    }
</style>
<article id="article">
    <div class="form-container">
        <?php 
            if(isset($thongbao)) {
                echo '<h1 class="thongBao"> '.$thongbao.'</h1>';
            }
        ?>
        <script>
            const thongBao = document.querySelector(".thongBao");
            let text =thongBao.textContent;
            if(text.trim() == 'Đăng ký thành công') {
                thongBao.style.color = "green";
            }
        </script>
        <div class="form-title">
            <h1>Đăng kí tài khoản</h1>
        </div>
        <form action="index.php?act=addUser" method="post" class="form-input" enctype="multipart/form-data">
            <div class="input-group">
                <label class="label">Email*</label>
                <input required autocomplete="off" name="email" id="Email" class="input" type="email">
            </div>

            <div class="input-group">
                <label class="label">Họ*</label>
                <input required autocomplete="off" name="firstName" id="Email" class="input" type="text">
            </div>

            <div class="input-group">
                <label class="label">Tên*</label>
                <input required autocomplete="off" name="lastName" id="Email" class="input" type="text">
            </div>

            <div class="input-group">
                <label class="label">Số điện thoại*</label>
                <input required autocomplete="off" name="phoneNumber" id="Email" class="input" type="number">
            </div>

            <div class="input-group">
                <label class="label">Địa chỉ*</label>
                <input required autocomplete="off" name="adr" id="Email" class="input" type="text">
            </div>

            <div class="input-group">
                <label class="label">Mật khẩu*</label>
                <input required autocomplete="off" name="password" id="Email" class="input" type="password">
            </div>
            <div class="btn-container">
                <button name="btn-register">ĐĂNG KÝ</button>
                <span>Bạn đã có tài khoản ? <a href="#" class="openLogin">Đăng nhập</a></span>
            </div>
        </form>
        
    </div>
</article>