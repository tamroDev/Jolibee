<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang quản trị</title>
    <link rel="icon" href="../view/images/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../view/css/header.css">
    <link rel="stylesheet" href="../view/css/slide.css">
    <link rel="stylesheet" href="../view/css/home.css">
    <link rel="stylesheet" href="../view/css/footer.css">
    <link rel="stylesheet" href="../view/css/login/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="view/images/logo.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coiny&family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        header, #footer {
            display: none;
        }
    
        .login-admin-container {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            max-width: 100%;
            background-image: url(https://marketplace.canva.com/EAEiFh2gWoY/2/0/1600w/canva-red-and-yellow-bold-savory-food-business-brand-linktree-background-MtcZxdSl-C4.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center top;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .login-form-admin {
            width: 50%;
            height: 470px;
            box-shadow: rgba(0, 0, 0, 0.85) 0px 5px 15px;
            background-color: bisque;
            /* font-family: "Roboto"; */
        }
        .login-form-admin h1 {
            color: #eb002f;
            font-size: 30px;
        }
        .admin-form {
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            gap: 10px;
            padding-top: 50px;
        }
    
        .admin-form input {
            height: 35px;
            width: 400px;
            border: none;
            border-radius: 20px;
            background-color: white;
            padding: 10px 25px;
            margin-bottom: 20px;
            font-size: 12px;
            border: 2px solid white;
        }
        .admin-form input:focus {
            border: 2px solid black;
        }
        .admin-title {
            width: 50%;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            font-size: 13px;
        }
    
        .admin-form button {
            text-transform: uppercase;
            padding: 14px 25px;
            background-color: #eb002f;
            color: white;
            font-weight: 700;
            font-size: 12px;
            border-radius: 10px;
        }
        .admin-form a {
            text-decoration: none;
            text-transform: uppercase;
            margin-top: 12px;
            color: black;
            font-weight: 600;
        }
    
        .admin-form a:hover {
            text-decoration: underline;
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
    <div class="login-admin-container">
        <div class="login-form-admin">
            <div class="title">
                <h1>Đăng nhập quản trị</h1>
            </div>
            <form action="./index.php?act=adminConfirm" method="post" class="admin-form">
                <div class="admin-title">Email:</div>
                <input type="text" name="email" placeholder="Email">
                <div class="admin-title">Mật Khẩu:</div>
                <input type="password" name="password" placeholder="Mật khẩu">
                <button name="submit">Đăng nhập <i class="fa-solid fa-arrow-right"></i></button>
                <a href="../index.php"><i class="fa-solid fa-arrow-left"></i> Back Home</a>
            </form>
            <div class="notifacion">
                <?php 
                    if(isset($thongbao)) {
                        echo $thongbao;
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
    
</body>
</html>