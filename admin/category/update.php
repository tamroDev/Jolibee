<?php
    if(is_array($updateCT)) {
        extract($updateCT);
    }
?>     
    <div class="right">
        <div class="container-content">
            <div class="btn-catogery">
                <a href="index.php?act=category">danh sách</a>
            </div>
            <div class="list">
                <div class="title-add">
                    Cập nhập danh mục
                </div>
                <form action="index.php?act=updateCT" method="post" class="formUD" enctype="multipart/form-data">
                    <div class="form-control">
                        <input type="value" required="" name="nameCT" value="<?=$nameCategory?>">
                        <label>
                            <span style="transition-delay:0ms">N</span>
                            <span style="transition-delay:50ms">a</span>
                            <span style="transition-delay:100ms">m</span>
                            <span style="transition-delay:150ms">e</span>
                            <span style="transition-delay:200ms">C</span>
                            <span style="transition-delay:250ms">a</span>
                            <span style="transition-delay:300ms">t</span>
                            <span style="transition-delay:350ms">e</span>
                            <span style="transition-delay:400ms">g</span>
                            <span style="transition-delay:450ms">o</span>
                            <span style="transition-delay:500ms">r</span>
                            <span style="transition-delay:550ms">y</span>
                        </label>
                    </div>
                    <div class="select-box">
                        <h2>Hình ảnh</h2>
                        <input type="file" name="img" placeholder="Ko có ảnh">
                        <img style="margin: auto;height:200px" src="../uploads/<?=$imgCT?>" alt="">
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <button class="openCancel" name="btn-update">
                        Cập Nhập
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>
                        </div>
                    </button>
                </form>
                <div class="cancel-container">
                    <div class="cancel">
                        <div class="confirm-img">
                            <img src="../view/images/confirm.png" alt="">
                        </div>    
                        <div class="title">
                            <h5>Bạn có chắc muốn cập nhập ?</h5>
                        </div>
                        <div class="content">
                            <span>Hành động này không thể hoàn tác.</span>
                        </div>
                        <div class="btn_act">
                            <a href="'.$xoadm.'">Xác nhận</a>
                            <a href="#" class="offCancel">Hủy</a>
                            <input type="hidden" name="nameCT" value="<?=$nameCategory?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
</body>
</html>