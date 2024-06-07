    <div class="right">
        <div class="container-content">
            <div class="btn-catogery">
                <a href="index.php?act=category">danh sách</a>
            </div>
            <div class="list">
                <div class="title-add">
                    Thêm danh mục
                </div>
                <form action="index.php?act=addCT" method="post" enctype="multipart/form-data">
                    <div class="form-control">
                        <input type="value" required="" name="nameCategory" >
                        <label>
                            <span style="transition-delay:0ms">U</span><span style="transition-delay:50ms">s</span><span style="transition-delay:100ms">e</span><span style="transition-delay:150ms">r</span><span style="transition-delay:200ms">n</span><span style="transition-delay:250ms">a</span><span style="transition-delay:300ms">m</span><span style="transition-delay:350ms">e</span>
                        </label>
                    </div>
                    <div class="select-box">
                        <h2>Hình ảnh</h2>
                        <input type="file" name="imgCT">
                    </div>
                    <button name="btn-add">
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