<link rel="stylesheet" href="view/css/cart/cart.css">
<article id="article">
    <?php 
        extract($cartProduct);
        $img = $img_path.$img;
    ?>
    <div class="cart-container">
        <div class="cart-title">
            <h1>Đặt Hàng</h1>
        </div>
        <div class="boxPro">
            <div class="boxCart">

                <?php 
                    if ($saleProduct > 0) {
                        echo '<div class="sale">Sale: '.$saleProduct.'%</div>';
                    } else {
                        echo "";
                    }
                ?>
                
                <div class="product">
                    <img src="<?=$img?>" alt="">
                    <h2><?=$namePD?></h2>
                </div>
                <div class="line-cart"></div>
                <div class="user-action">
                    <form action="index.php?act=inrsetCart" method="post">
                        <input type="hidden" name="idProduct" value="<?=$id?>">
                        <?php 
                            if (isset($_SESSION['user'])) {
                                echo '<input type="hidden" name="iduser" value="'.$_SESSION['user']['id'].'">';
                            }
                        ?>
                        
                        <div class="price priceDot">
                            <h2>Đơn giá :</h2>
                            <?php 
                                if ($saleProduct > 0) {
                                    echo "<span>$priceSale</span>";
                                } else {
                                    echo "<span>$pricePD</span>";
                                }
                            ?>
                            
                        </div>
                        <div class="quantity">
                            <h2>Số Lượng :</h2>
                            <input class="minus" type="button" value="-">
                            <input class="total" type="text" value="1" name="quantity">
                            <input class="plus" type="button" value="+">
                        </div>
                        <div class="btn-addCart">
                            <button name="btn-cart">Đặt Hàng</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="like-products">
                <div class="like-title">
                    Món tương tự
                </div>
                <div class="like-product">
                        <?php 
                            $listPD = select_product_CT ($iddm);
                            foreach ($listPD as $PD) {
                                extract($PD);
                                $imgNew = $img_path.$img;
                                $addCart = "index.php?act=addCart&id=".$id;
                                echo '
                                <div class="like-item">
                                    <a href="'.$addCart.'">
                                        <img src="'.$imgNew.'" alt="">
                                        <div class="content-like priceDot">
                                            <h1>'.$namePD.'</h1> <br>
                                            <span>'.$pricePD.'</span>
                                        </div>
                                    </a>
                                </div>';
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</article>
<script src="view/js/price.js"></script>
<script>
    const minus =document.querySelector(".minus");
    const plus =document.querySelector(".plus");
    const total =document.querySelector(".total");
    var totalElement = 1;

    plus.addEventListener("click",() => {
        totalElement =totalElement + 1;
        total.value = totalElement;
    })

    minus.addEventListener("click",() => {
        if (total.value <= 1) {
            total.value = 1;
        }else {
            totalElement =totalElement - 1;
            total.value = totalElement;
        }
    })
</script>