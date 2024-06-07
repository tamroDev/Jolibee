<link rel="stylesheet" href="../view/css/feedback/feedback.css">
    <div class="right">
        <?php 
            extract($feedbackItem);

            $user = loadOne_feedbackUser ($iduser);
            extract($user);
            $img = '../'.$img_path.$imgUser;

            $repContent = loadOne_Repfeedback ($idFB);
            if(is_array($repContent)){
                extract($repContent);
            }
        ?>
        <div class="repContainer">
            <div class="back">
                <div class="action-feedback">
                    <a href="index.php?act=showFeedback">Quay Lại</a>
                </div>
                <div class="name-feedback">
                    <strong>Phản hồi của người dùng :</strong> <?=$feedbackName?>
                </div>
            </div>
            <div class="content-feedback">
                <div class="user">
                    <div class="img-user">
                        <img src="<?=$img?>" alt="">
                        <h2><?=$feedbackName?></h2>
                    </div>
                    <div class="content-user">
                        <?=$feedbackContent?>
                    </div>
                </div>
                <div class="admin">
                    <div class="content-user">
                        <?php
                            if(is_array($repContent)) {
                                echo $content;
                            }
                        ?>
                    </div>
                    <div class="img-user">
                        <img src="data:image/jpeg;base64,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" alt="">
                        <h2>QTV</h2>
                    </div>
                </div>
            </div>
            <div class="submit-feedback">
                <form action="index.php?act=rep" method="post">
                    <input type="text" name="content" class="admin-content" placeholder="Viết phản hồi tại đây">
                    <input type="hidden" name="idFeedback" value="<?=$idFB?>">
                    <button name='submit-rep'>Gửi</button>
                </form>
            </div>
        </div>
    </div>
<script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
</body>
</html>