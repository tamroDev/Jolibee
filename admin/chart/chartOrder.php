<link rel="stylesheet" href="../view/css/chart/chart.css">
    <div class="right">
        <div class="chart-container">
            <div style="margin-bottom: 20px;" class="chart-title">
                Lịch sử đặt hàng
            </div>
            <div class="chart-product">
                <div class="back">
                    <a href="index.php?act=showChart">Quay lại</a>
                </div>
                <div class="content-chartProduct">
                    <table>
                        <tr>
                            <th>STT Đơn</th>
                            <th>Số tiền</th>
                            <th>Ngày đặt</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái</th>
                        </tr>
                        <?php
                            foreach ($orders as $order) {
                                extract($order);
                                if($statusOrder < 2) {
                                    $statusOrder = "Chưa Hoàn Thành";
                                }





                                if($statusOrder == 2) {
                                    $statusOrder = "Hoàn Thành";
                                }
                                echo '
                                <tr>
                                    <td>'.$id.' </td>
                                    <td>'.$total_amount.' </td>
                                    <td>'.$order_date.'</td>
                                    <td>'.$payMethod.'</td>
                                    <td class="status">'.$statusOrder.'</td>
                                </tr>
                                ';
                            }
                        ?>
                        
                    </table>
                </div>
                <script> 
                    const statusOrder =document.querySelectorAll (".status");
                    statusOrder.forEach(item => {
                        if(item.textContent == "Chưa Hoàn Thành") {
                            item.style.color = "red";
                        } else {
                            item.style.color = "green"
                        }
                    })
                </script>
            </div>
        </div>
    </div>
<script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
</body>
</html>
<script src="../view/js/price.js"></script>