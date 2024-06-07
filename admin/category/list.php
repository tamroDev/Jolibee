    <div class="right">
        <div class="container-content">
            <div class="btn-catogery">
                <a href="index.php?act=addCategory">Thêm danh mục mới</a>
            </div>
            <div class="list">
                <table>
                    <tr>
                        <th>Mã loại</th>
                        <th>Ảnh danh mục</th>
                        <th>Tên loại</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php                   
                        foreach ($listCT as $category) {
                            extract($category);
                            $suadm = "index.php?act=updateCategory&id=".$id;
                            $xoadm = "index.php?act=deleteCategory&id=".$id;
                            $hinhpath = "../uploads/".$imgCT;
                            if(is_file($hinhpath)) {
                                $img ="<img src='".$hinhpath."' height='120px'>";
                            }else {
                                $img = "No photo";
                            }
                            echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $img . '</td>
                                <td>' . $nameCategory . '</td>
                                <td class="action-btn">
                                    <a href="' . $suadm . '"><i class="fa-solid fa-wrench"></i></a>
                                    <a href="#"><i class="fa-solid fa-trash-can openCancel" data-product-id="'.$id.'"></i><input class="btn-act delete " type="hidden" value="xoá" ></a>
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
                                            <a href="'.$xoadm.'">Xác nhận</a>
                                            <a href="#" class="offCancel">Hủy</a>
                                        </div>
                                    </div>
                                </div>
                            </tr>';
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
            const xoasp = "index.php?act=deleteCategory&id=" + productId;

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