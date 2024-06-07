<article id="article">

    <?php
        if (isset($productData)) {
            foreach ($productData as $product) {
                echo '<div class="product-info">';
                echo "Số lượng: " . $product['quantity'] . "<br>";
                echo 'Ảnh: <img src="' . $product['img'] . '" alt=""><br>';
                echo "Tên sản phẩm: " . $product['namePD'] . "<br>";
                echo "Giá: " . $product['pricePD'] . "<br>";
                echo "</div>";
            }
        }
    ?>
    <form action="index.php?act=addToOrder" ></form>
</article>

<div class="pay-container">
</div>