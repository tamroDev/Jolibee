    <div class="right">
        <div class="container-content">
            <div class="list">
                <table>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Ngày đặt</th>
                        <th>Phương thức thanh toán</th>
                        <th>Tổng Đơn</th>
                        <th>Người đặt</th>
                        <th>Trạng Thái</th>
                        <th>Action</th>
                        
                    </tr>

                    <?php 
                        if(isset($orders)) {
                            foreach ($orders as $order) {
                                extract($order);
                                $order_details = "index.php?act=order_details&order_id=".$id;
                                $order_delete = "index.php?act=order_delete&order_id=".$id;
                                if($payMethod == "thanhtoankhinhan") {
                                    $payMethod = "Thanh Toán Khi Nhận hàng";
                                }
                                if($payMethod == "vidientu") {
                                    $payMethod = "Ví điện Tử";
                                }
                                echo '<tr>
                                        <td>'.$id.'</td>
                                        <td>'.$order_date.'</td>
                                        <td>'.$payMethod.'</td>
                                        <td>'.$total_amount	.'</td>
                                        <td>'.$iduser.'</td>
                                        <td>
                                            <form method="post">
                                                <select name="statusOrder" onchange="this.form.submit()">
                                                    <option style= "color:green" value="0" '.($statusOrder == "0" ? "selected" : "").'>Đang chờ</option>
                                                    <option style= "color:red" value="1" '.($statusOrder == "1" ? "selected" : "").'>Đang giao</option>
                                                    <option style= "color:red" value="2" '.($statusOrder == "2" ? "selected" : "").'>Đã hoàn thành</option>
                                                </select>
                                                <input type="hidden" name="orderId" value="'.$id.'">
                                            </form>
                                        </td>
                                        <td class="action">
                                            <a href="'.$order_details.'"><i class="fa-solid fa-info"></i></a>
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
                                                    <a href="'.$order_delete.'">Xác nhận</a>
                                                    <a href="#" class="offCancel">Hủy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>';

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                        
                                    if (isset($_POST["statusOrder"])) {
                                        $newStatus = $_POST["statusOrder"];
                                        $orderId = $_POST["orderId"];
                                        
                                        // Thực hiện truy vấn SQL để cập nhật trạng thái trong cơ sở dữ liệu
                                        $sqlStatus = "UPDATE orders SET statusOrder = '$newStatus' WHERE id = $orderId";
                                        pdo_query($sqlStatus);
                                    }
                                
                                    // Chuyển hướng sau khi xử lý POST
                                    header("location: index.php?act=showOrder");
                                }
                            }
                        }
                    ?>
                </table>
            </div>
            <style>
                .list {
                    width: 90%;
                    margin: auto;
                    text-align: center;
                }

                .list form {
                    border: none;
                    padding: 0;
                }

                .action a{
                    text-transform: uppercase;
                    text-decoration: none;
                    color: black;
                    margin-left: 10px;
                    font-size: 27px;
                }
                
                tr:hover .action a:first-child {
                    color: red;
                }
            </style>
        </div>
    </div>
<script>
    const openCancelButtons = document.querySelectorAll(".openCancel");
    const cancelContainer = document.querySelector(".cancel-container");
    const offCancelButtons = document.querySelectorAll(".offCancel");

    openCancelButtons.forEach(button => {
        button.addEventListener("click", () => {
            // Lấy ID sản phẩm từ thuộc tính dữ liệu "data-product-id"
            const productId = button.getAttribute("data-product-id");

            // Xác định đường dẫn xóa sản phẩm dựa trên productId
            const xoasp = "index.php?act=order_delete&id=" + productId;

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
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>