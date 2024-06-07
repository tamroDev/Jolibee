<link rel="stylesheet" href="../view/css/chart/chart.css">
    <div class="right">
        <div class="chart-container">
            <div style="margin-bottom: 20px;" class="chart-title">
                Chi tiết nhân viên
            </div>
            <div class="chart-product">
                <div class="back">
                    <a href="index.php?act=showChart">Quay lại</a>
                </div>
                <div class="content-chartProduct">
                    <table>
                        <tr>
                            <th>Tên nhân viên</th>
                            <th>Ảnh</th>
                            <th>Quê quán</th>
                            <th>Số điện thoại</th>
                            <th>Xem</th>
                        </tr>
                        <?php
                            $list = select_user();
                            foreach ($list as $listUser) {
                                extract($listUser);
                                echo '
                                <tr>
                                    <td>'.$firstName.' '.$lastName.' </td>
                                    <td><img src="../uploads/avt-user.png" alt=""></td>
                                    <td>'.$adr.'</td>
                                    <td>'.$phoneNumber.'</td>
                                    <td><a href="index.php?act=showUser">Xem</a></td>
                                </tr>
                                ';
                            }
                        ?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
<script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
</body>
</html>
<script src="../view/js/price.js"></script>