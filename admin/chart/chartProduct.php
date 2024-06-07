    <link rel="stylesheet" href="../view/css/chart/chart.css">
    <div class="right">
        <div class="chart-container">
            <div style="margin-bottom: 20px;" class="chart-title">
                Chi tiết sản phẩm
            </div>
            <div class="chart-product">
                <div class="back">
                    <a href="index.php?act=showChart">Quay lại</a>
                </div>
                <div class="content-chartProduct">
                    <table>
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Ảnh</th>
                            <th>Sản phẩm đã thêm</th>
                            <th>Trung bình giá</th>
                            <th>Xem</th>
                        </tr>
                        <?php 
                            foreach ($listCT as $list) {
                                extract($list);
                                $sum = sum_product($id);
                                $count = count_chartProduct($id);
                                $newSum = $sum / 9;
                                $SumPrice = round($newSum, 0);
                                echo '<tr>
                                <td>'.$nameCategory.'</td>
                                <td><img src="../uploads/'.$imgCT.'" alt=""></td>
                                <td>'.$count.'</td>
                                <td class="priceDot"><span>'.$SumPrice.'</span></td>
                                <td><a href="index.php?act=products">Xem</a></td>
                            </tr>';
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