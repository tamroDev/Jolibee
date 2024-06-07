    <link rel="stylesheet" href="../view/css/product/product.css">
    <div class="right">
        <div class="container-content">
            <div class="head-action">
                <div class="btn-category">
                    <a href="index.php?act=addProduct">Thêm sản phẩm</a>
                </div>
                <form class="search-form" action="index.php?act=products" method="post" style="margin:30px">
                    <select class="category-select" name="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listcategory as $danhmuc) {
                            extract($danhmuc);
                            if ($iddm == $id) {
                                echo '<option value="' . $id . '" selected>' . $nameCategory . '</option>';
                            } else {
                                echo '<option value="' . $id . '" >' . $nameCategory . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <input class="search-input" type="text" name="kyw" placeholder="Search">
                    <input class="search-button" type="submit" name="listok" value="Tìm">
                </form>
            </div>
            <div class="list">
                <style>
                    th {
                        font-size: 16px;
                    }


                </style>
                <table>
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình</th>
                        <th>Giá</th>
                        <th>% Giảm giá</th>
                        <th>Giá Giảm</th>
                        <th>Số Lượt Mua</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        foreach ($listproduct as $sanpham) {
                            extract($sanpham);
                            $suasp = "index.php?act=updateProduct&id=".$id;
                            $xoasp = "index.php?act=deletePD&id=".$id;
                            $hinhpath = "../uploads/".$img;
                            if(is_file($hinhpath)) {
                                $img ="<img src='".$hinhpath."' height='120'>";
                            }else {
                                $img = "No photo";
                            }
    
                            echo ' <tr>
                                    <td>'.$id.'</td>
                                    <td style="width:300px;">'.$namePD.'</td>
                                    <td style="width:120px; text-align:center">'.$img.'</td>
                                    <td>'.$pricePD.'</td>
                                    <td>'.$saleProduct.'</td>
                                    <td>'.$priceSale.'</td>
                                    <td>'.$buying.'</td>
                                    <td class="action-btn">
                                        <a href="'.$suasp.'"><i class="fa-solid fa-wrench"></i></a>
                                        <a href="#"><i class="fa-solid fa-trash-can openCancel" data-product-id="'.$id.'"></i></a>
                                    </td>
                                    <div class="cancel-container">
                                        <div class="cancel">
                                            <div class="confirm-img">
                                                <img src="../view/images/confirm.png" alt="">
                                            </div>    
                                            <div class="title">
                                                <h5>Bạn có chắc muốn xóa ?</h5>
                                            </div>
                                            <div class="content">
                                                <span>Hành động này không thể hoàn tác.</span>
                                            </div>
                                            <div class="btn_act">
                                                <a href="'.$xoasp.'">Xác nhận</a>
                                                <a href="#" class="offCancel">Hủy</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </tr>
                                ';
                        }                
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
    <script>
        const openCancelButtons = document.querySelectorAll(".openCancel");
        const cancelContainer = document.querySelector(".cancel-container");
        const offCancelButtons = document.querySelectorAll(".offCancel");

        openCancelButtons.forEach(button => {
            button.addEventListener("click", () => {
                // Lấy ID sản phẩm từ thuộc tính dữ liệu "data-product-id"
                const productId = button.getAttribute("data-product-id");

                // Xác định đường dẫn xóa sản phẩm dựa trên productId
                const xoasp = "index.php?act=deletePD&id=" + productId;

                // Cập nhật liên kết trong hộp thoại xác nhận
                const confirmButton = cancelContainer.querySelector(".btn_act a:first-child");
                confirmButton.href = xoasp;

                // Hiển thị hộp thoại xác nhận
                cancelContainer.classList.add("is-show");
            });
        });

        offCancelButtons.forEach(button => {
            button.addEventListener("click", () => {
                cancelContainer.classList.remove("is-show");
            });
        });

    </script>
</body>
</html>