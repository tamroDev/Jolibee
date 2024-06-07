<div class="right">
    <style>
        .form-control {
            margin: 7px 0;
        }
    </style>
        <div class="container-content">
            <div class="btn-catogery">
                <a href="index.php?act=products">danh sách Sản Phẩm</a>
            </div>
            <div class="list">
                <div class="title-add">
                    Thêm Sản Phẩm
                </div>
                <form action="index.php?act=addProduct" method="post" enctype="multipart/form-data">
                    <div class="select-box">
                        <h2>Danh mục sản phẩm</h2>
                        <select name="iddm">
                            <?php
                                foreach ($listcategory as $category) {
                                    extract($category);
                                    echo '<option value="' . $id . '">' . $nameCategory . '</option>';
                                }
                            ?>
                        </select>  
                    </div>
                    <div class="form-control">
                        <input type="value" required="" name="nameProduct">
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
                        <input type="value" required="" name="priceProduct">
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
                        <input type="value" required="" name="saleProduct">
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
                    <div class="select-box">
                        <h2>Hình ảnh</h2>
                        <input type="file" name="imgProduct">
                    </div>
                    <button name="btn-addPD">
                        Thêm mới
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>

                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
<script src="https://kit.fontawesome.com/b8d3f92d8d.js" crossorigin="anonymous"></script>
</body>
</html>