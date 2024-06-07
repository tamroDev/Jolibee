<article id="article">
    <?php if(isset($_SESSION['user'])) {
        $iduser = $_SESSION['user']['id'];
    }else {
        $iduser = 0;
    } ?>
<div class="form">
            <div class="title-lienhe">
                Liên hệ với chúng tôi
            </div>
            <form action="index.php?act=feedback" id="form1" method="post">
                <input type="text" autocomplete="off" required id="fname" name="fname" value="<?=$_SESSION['user']['firstName'] .' '.$_SESSION['user']['lastName']?>"  placeholder="Họ tên"><br>
                <input type="text" autocomplete="off" required id="femail" name="ftitle" placeholder="Tiêu Đề"><br>
                <input type="text" autocomplete="off" required id="fcontent" name="fcontent" placeholder="Nội dung yêu cầu"><br>
                <input type="hidden" name="fid" value="<?=$iduser?>">
                <button name="btn-submit">Gửi Yêu Cầu 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                        <path fill="currentColor" d="M18 2.5c-8.82 0-16 6.28-16 14s7.18 14 16 14a18 18 0 0 0 4.88-.68l5.53 3.52a1 1 0 0 0 1.54-.84v-6.73a13 13 0 0 0 4-9.27C34 8.78 26.82 2.5 18 2.5Zm10.29 22.11a1 1 0 0 0-.32.73v5.34l-4.38-2.79a1 1 0 0 0-.83-.11a16 16 0 0 1-4.76.72c-7.72 0-14-5.38-14-12s6.28-12 14-12s14 5.38 14 12a11.08 11.08 0 0 1-3.71 8.11Z" class="clr-i-outline clr-i-outline-path-1"/>
                        <path fill="currentColor" d="M25 15.5H11a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" class="clr-i-outline clr-i-outline-path-2"/>
                        <path fill="currentColor" d="M21.75 20.5h-7.5a1 1 0 0 0 0 2h7.5a1 1 0 0 0 0-2Z" class="clr-i-outline clr-i-outline-path-3"/>
                        <path fill="currentColor" d="M11.28 12.5h13.44a1 1 0 0 0 0-2H11.28a1 1 0 0 0 0 2Z" class="clr-i-outline clr-i-outline-path-4"/>
                        <path fill="none" d="M0 0h36v36H0z"/>
                    </svg>
                </button>
                <h2><?php 
                    if(isset($thongbao)) {
                       echo $thongbao;
                    } else {echo '';}
                    ?>
                </h2>
            </form>
        </div>
    </div>
    <style>
        #form1 h2 {
            text-transform: uppercase;
            color: black;
            margin-top: 20px;
            font-size: 17px;
            text-align: center;
            font-weight: 700;
            margin-top: 30px;
        }

        #form1 h2 a {
            padding: 10px 12px;
            background-color: #e31837;
            color: white;
            text-decoration: none;
            border-radius: 12px;
        }
        #footer {
            margin-top: 0;
        }
        /* Mã CSS */
        .title-lienhe {
            width: 100%;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            color: black;
            font-style: italic;
            font-size: 45px;
            text-transform: uppercase;
            font-family: "Agbalumo";
            color: #e31837;
            margin-bottom: 70px;
        }
        .form {
            text-align: center;
            background-color: #f5f1e6;
            padding: 50px;
        }
        #form1 {
            width: 600px;
            margin: 0 auto;
        }
        #form1 input[type=text] {
            width: 100%;
            box-sizing: border-box;
            font-size: 18px;
            color: #555;
            display: block;
            line-height: 1.2;
            background-color: #fff;
            border-radius: 20px;
            margin-bottom: 10px;
            height: 50px;
            padding: 0 20px 0 23px;
            border: 0;
            box-shadow: 0 5px 20px 0 rgb(0 0 0 / 5%);
            -moz-box-shadow: 0 5px 20px 0 rgba(0,0,0,.05);
            -webkit-box-shadow: 0 5px 20px 0 rgb(0 0 0 / 5%);
            -o-box-shadow: 0 5px 20px 0 rgba(0,0,0,.05);
            -ms-box-shadow: 0 5px 20px 0 rgba(0,0,0,.05);
        }
        #form1 input[type=text]:focus{
            outline: none;
            box-shadow: 0 5px 20px 0 rgb(250 66 81 / 10%);
            -moz-box-shadow: 0 5px 20px 0 rgba(250,66,81,.1);
            -webkit-box-shadow: 0 5px 20px 0 rgb(250 66 81 / 10%);
            -o-box-shadow: 0 5px 20px 0 rgba(250,66,81,.1);
            -ms-box-shadow: 0 5px 20px 0 rgba(250,66,81,.1);
            border: 1px solid black;
        }
        #form1 #fcontent {
            outline: none;
            min-height: 150px;
        }

        #form1 button {
            padding: 15px 20px;
            background-color: #e31837;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 700;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            gap: 7px;
        }

        #form1 button:hover  {
            color: black;
        }

        .content-header .menu ul li:nth-child(5) a{
            border: 2px solid #f4d2d6;
            border-bottom: none;
            background-color: #f4d2d6;
            color: var(--bgr-red);
        }
    </style>
    <script>
        const noti =document.querySelector("#form1 h2");
        console.log(noti);
        if (noti && noti.textContent.trim() === "Gửi yêu cầu thành công. <a href='index.php?act=feedbackFollow'>Theo dõi phản hồi tại đây.</a>") {
            noti.style.color = "green";
        }
        
    </script>
</article>
