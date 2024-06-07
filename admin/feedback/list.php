<div class="right">
        <div class="container-content">
            <div class="list">
                <table>
                    <tr>
                        <th>Mã Phản Hồi</th>
                        <th>Tên người gửi</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ngày gửi</th>
                        <th>Trạng Thái</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php 
                        foreach ($feedbacks as $feedback) {
                            extract($feedback);
                            $rep = 'index.php?act=repFeedback&idFB='.$idFB;
                            $delete = 'index.php?act=deleteFeedback&idFB='.$idFB;
                            $Status = "";
                            if ($feedbackStatus == 0) {
                                $Status = "Chưa phản hồi";
                            } else {
                                $Status = "Đã phản hồi";
                            }
                            echo '
                            <tr>
                                <td>'.$idFB.'</td>
                                <td>'.$feedbackName.'</td>
                                <td>'.$feedbackTitle.'</td>
                                <td>'.$feedbackContent.'</td>
                                <td>'.$feedbackTime.'</td>
                                <td>
                                    <form method="post">
                                        <select class="thStatus" name="feedbackStatus" onchange="this.form.submit()">
                                            <option  value="0" '.($feedbackStatus == "0" ? "selected" : "").'>Chưa phản hồi</option>
                                            <option  value="1" '.($feedbackStatus == "1" ? "selected" : "").'>Đã phản hồi</option>
                                        </select>
                                        <input type="hidden" name="feedbackId" value="'.$idFB.'">
                                    </form>
                                </td>
                                <td><a href="'.$rep.'">Rep</a>
                                <div data-product-id="'.$idFB.'" class="openCancel">
                                    <a class=""   href="#">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
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
                                        <div class="btn_act_2">
                                            <a style="color:black;line-height:30px" href="'.$delete.'">Xác nhận</a>
                                            <a href="#" class="offCancel">Hủy</a>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>    
                            ';
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                        
                                if (isset($_POST["feedbackStatus"])) {
                                    $newStatus = $_POST["feedbackStatus"];
                                    $feedbackId = $_POST["feedbackId"];
                                    
                                    // Thực hiện truy vấn SQL để cập nhật trạng thái trong cơ sở dữ liệu
                                    $sqlStatus = "UPDATE feedback SET feedbackStatus = '$newStatus' WHERE idFB = $feedbackId";
                                    pdo_query($sqlStatus);
                                }
                            
                                // Chuyển hướng sau khi xử lý POST
                                header("location: index.php?act=showFeedback");
                            }
                        }
                    
                    ?>
                </table>
            </div>
            <style>
                tr {
                    background-color: white;
                    height: 70px;
                }
                tr td:nth-child(2) {
                    text-align: start;
                    color: #0074dd;
                }

                tr td:nth-child(3) {
                    font-weight: 500 !important;
                }

                tr td:nth-child(3),
                tr td:nth-child(4) {
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    max-width: 200px;
                    color: black;
                    width: 200px;
                    text-align: start;
                    font-weight: 300;
                }
                .right {
                    padding: 10px;
                }
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

                tr td:last-child  {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;
                    padding-top: 35px;
                }

                tr td:last-child a {
                    padding: 10px;
                    text-decoration: none;
                    color: white;
                    background-color: #e31837;
                    border-radius: 10px;
                }

                tr td:last-child a:hover {
                    color: black;
                }

                .thStatus option[value="0"] {
                    color: red; /* Màu chữ khi option là "Chưa phản hồi" */
                }
                .thStatus option[value="1"] {
                    color: green; /* Màu chữ khi option là "Chưa phản hồi" */
                }

                .btn_act_2 > a  {
                    background-color: #0074dd !important;
                    color: white !important;
                }

                .btn_act_2 > a:last-child {
                    background-color: #e31837 !important;
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
                const xoasp = "index.php?act=deleteFeedback&idFB=" + productId;

                // Cập nhật liên kết trong hộp thoại xác nhận
                const confirmButton = cancelContainer.querySelector(".btn_act_2 a:first-child");
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
    <script>
        const statusFB =document.querySelectorAll(".thStatus");
        statusFB.forEach (item => {
            if(item.value == 1) {
                item.style.color = "green";
            } else {
                item.style.color = "red";
            }
        })
    </script>
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>