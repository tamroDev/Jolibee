    <link rel="stylesheet" href="../view/css/product/product.css">
    <style>
        .form-control input:focus, .form-control input:valid {
            outline: 0;
            border-bottom-color: #000;
        }

        .form-control input {
            background-color: transparent;
            border: 0;
            border-bottom: 2px #000 solid;
            display: block;
            width: 100%;
            padding: 7px 0;
            font-size: 18px;
            color: #000;
            font-weight: 700;
        }

        .form-control input:focus+label span, .form-control input:valid+label span {
            color: #000;
        }

        .list form {
            padding: 80px;
        }
    </style>
    <div class="right">
        <div class="container-content">
            <div class="list">
                <?php 
                    extract($product);
                ?>
                <form action="index.php?act=updatePD" method="post" enctype="multipart/form-data">
                    <div class="select-box">
                        <h2>Danh mục sản phẩm</h2>
                        <select name="iddm">
                            <?php
                                foreach ($listcategory as $category) {
                                    var_dump($listcategory);
                                    if ($iddm == $category['id']) {
                                    echo '<option value="' . $category['id'] . '" selected>' . $category['nameCategory'] . '</option>';
                                    }else {
                                        echo '<option value="' . $category['id'] . '" >' . $category['nameCategory'] . '</option>';  
                                
                                    }
                                }
                            ?>
                        </select>  

                    </div>
                    <div class="form-control">
                        <input type="value" required="" value="<?=$namePD?>" name="nameProduct">
                        <label>
                            <span style="transition-delay:0ms">T</span>
                            <span style="transition-delay:50ms">ê</span>
                            <span style="transition-delay:100ms">n</span>
                            <span style="transition-delay:150ms">S</span>
                            <span style="transition-delay:200ms">ả</span>
                            <span style="transition-delay:250ms">n</span>
                            <span style="transition-delay:300ms">P</span>
                            <span style="transition-delay:400ms">h</span>
                            <span style="transition-delay:450ms">ẩ</span>
                            <span style="transition-delay:500ms">m</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="value" required="" value="<?=$pricePD?>" name="priceProduct">
                        <label>
                            <span style="transition-delay:0ms">G</span>
                            <span style="transition-delay:50ms">i</span>
                            <span style="transition-delay:100ms">á</span>
                            <span style="transition-delay:150ms">S</span>
                            <span style="transition-delay:200ms">ả</span>
                            <span style="transition-delay:250ms">n</span>
                            <span style="transition-delay:300ms">P</span>
                            <span style="transition-delay:400ms">h</span>
                            <span style="transition-delay:450ms">ẩ</span>
                            <span style="transition-delay:500ms">m</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="value" required="" value="<?=$saleProduct?>" name="saleProduct">
                        <label>
                            <span style="transition-delay:0ms">G</span>
                            <span style="transition-delay:50ms">i</span>
                            <span style="transition-delay:100ms">ả</span>
                            <span style="transition-delay:150ms">m</span>
                            <span style="transition-delay:200ms">G</span>
                            <span style="transition-delay:250ms">i</span>
                            <span style="transition-delay:300ms">á</span>
                        </label>
                    </div>
                    
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="select-box">
                        <h2>Hình ảnh</h2>
                        <input type="file" name="img" placeholder="Ko có ảnh">
                        <img style="margin: auto;height:200px" src="../uploads/<?=$img?>" alt="">
                        
                    </div>
                    <div class="btn-update">
                        <button name="btn-update">
                            Cập nhập
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>

                            </div>
                        </button>
                        <a href="index.php?act=products">Danh sách sản phẩm</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
</body>
</html>