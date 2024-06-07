<link rel="stylesheet" href="view/css/cartFollow/cartFollow.css">
<link rel="stylesheet" href="view/css/feedback/feedback.css">
<style>
    .control-bar ul li:nth-child(3) {
        background-color: #635f5f;
    }

    .control-bar ul li:nth-child(3) a {
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
                    Phản hồi của bạn
                </div>
                <ul>
                    <div class="feedbackBox">    
                        <?php 
                        foreach ($listFeedback as $feedback) {
                            extract($feedback);
                            $Status = "";
                            if ($feedbackStatus == 0) {
                                $Status = "Chưa phản hồi";
                            } else {
                                $Status = "Đã phản hồi";
                            }
                            $detailFeedback = 'index.php?act=detailsFeedback&id='.$idFB;
                            $deleteFeedback = 'index.php?act=deleteFeedback&idFB='.$idFB;
                            echo ' <div class="item-th">
                            <div class="stt">
                                #FB'.$idFB.'
                            </div>
                            <div class="thTitle">
                                '.$feedbackTitle.'
                            </div>
                            <div class="thContent">
                                '.$feedbackContent.'
                            </div>
                            <div class="thStatus">
                                '.$Status.'
                            </div>
                            <div class="thAction">
                                <a href="'.$detailFeedback.'">Xem</a>
                                <a href="'.$deleteFeedback.'">Xóa</a>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                    <div class="positionTR">
                        <div class="item-ps">
                            STT
                        </div>
                        <div class="item-title">
                            Tiêu Đề
                        </div>
                        <div class="item-content">
                            Nội Dung
                        </div>
                        <div class="item-status">
                            Trạng thái
                        </div>
                        <div class="item-action">
                            Xem
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</article>
<script>
    const statusFB =document.querySelectorAll(".thStatus");
    statusFB.forEach (item => {
        if (item.textContent.trim() == "Đã phản hồi") {
            item.style.color = "green";
            item.style.fontWeight = "600";
        }
    })
</script>