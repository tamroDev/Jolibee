<link rel="stylesheet" href="../view/css/chart/chart.css">
    <div class="right">
        <div class="chart-container">
            <div class="chart-title">
                Quản Lý Thống Kê
            </div>
            <div class="charts">
                <div class="chart-item">
                    <div class="title-item">
                        Quản Lý Sản Phẩm
                    </div>
                    <div class="content-item">
                        <div class="info-content priceDot">
                            <div>Số lượng sản phẩm: <h1><?=$products?></h1></div>
                            <br> Giá trung bình: <span><?=$roundedSumPrice?> VNĐ</span>
                        </div>
                        <div class="img-content">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                    </div>
                    <div class="detail">
                        <a href="index.php?act=chartProduct">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="chart-item">
                    <div class="title-item">
                        Quản Lý Nhân viên
                    </div>
                    <div class="content-item">
                        <div class="info-content">
                            Số lượng nhân viên: <span><?=$user?></span>
                        </div>
                        <div class="img-content">
                            <i class="fa-solid fa-users-between-lines"></i>
                        </div>
                    </div>
                    <div class="detail">
                        <a href="index.php?act=chartUser">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="chart-item">
                    <div class="title-item">
                        Quản Lý Đơn hàng
                    </div>
                    <div class="content-item">
                        <div class="info-content">
                            Số lượng đơn hàng: <span><?=$orders?></span>
                        </div>
                        <div class="img-content">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                    <div class="detail">
                        <a href="index.php?act=chartorder">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="chart-item">
                    <div class="title-item">
                        Quản Lý Danh Thu
                    </div>
                    <div class="content-item">
                        <div class="info-content priceDot">
                            Danh thu tạm tính: <span class="tamtinh"><?=$totalOrder?></span>
                            Danh thu thực tế: <span class="thucte"><?=$totalDanhthu?></span>
                        </div>
                        <div class="img-content">
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                    </div>
                    <div class="detail">
                        <a class="modalOpen" href="#">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <input type="hidden" class="numerbOD" value="<?=$orders?>">
                    <input type="hidden" class="numberHT" value="<?=$totalHT?>">
                    
                </div>

                <div class="chart-item">
                    <div class="title-item">
                        Quản Lý Phản hồi
                    </div>
                    <div class="content-item">
                        <div class="info-content priceDot">
                            Số lượt liên hệ: <spa><?=$countFB?></spa> <br>
                            Chưa phản hồi: <spa><?=$countRep?></spa>
                        </div>
                        <div class="img-content">
                            <i class="fa-solid fa-volume-high"></i>
                        </div>
                    </div>
                    <div class="detail">
                        <a href="index.php?act=showFeedback">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
                    </div>                    
                </div>
            </div>
            <style>
         
            </style>
        </div>
        <script>
            const modalOpen =document.querySelector(".modalOpen");
            let tamtinh =document.querySelector(".tamtinh").textContent;
            let thucte =document.querySelector(".thucte").textContent;
            let numerbOD =document.querySelector(".numerbOD").value;
            let numberHT =document.querySelector(".numberHT").value;

            const templale = `<div class="modal-container">
                <div class="modal">
                    <div class="title-modal">
                        Danh thu chi tiết
                    </div>
                    <div class="content-modal">
                        <div class="modal-item">
                        <p> tạm tính: <span>${tamtinh} VNĐ</span></p>
                            <p>số lượng đơn : <span>${numerbOD}</span></p>
                            <p> <h3>*Lưu ý:</h3> dựa trên tổng số đơn được đặt trong tháng</p>
                        </div>
                        <div class="modal-item">
                            <p> tạm tính: <span>${thucte} VNĐ</span></p>
                            <p>số lượng đơn : <span>${numberHT}</span></p>
                            <p> <h3>*Lưu ý:</h3> dựa trên tổng số đơn ở trạng thái hoàn thành</p>
                        </div>
                    </div>
                    <div class="close-x modal-close">
                        x
                    </div>
                </div>
            </div>`;

            modalOpen.addEventListener('click', function() {
                document.body.insertAdjacentHTML("beforeend",templale);
                console.log(templale);
            });

            document.body.addEventListener('click',function (event) {
                console.log(event.target);
                if(event.target.matches(".modal-close")) {
                    const modal = event.target.parentNode.parentNode;
                    modal.parentNode.removeChild(modal);
                }else if (event.target.matches(".modal-container")) {
                    console.log("HAHAH");
                    event.target.parentNode.removeChild(event.target)

                }
            })
        </script>
    </div>
    <script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
</body>
</html>
<script src="../view/js/price.js"></script>