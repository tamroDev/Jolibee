<link rel="stylesheet" href="view/css/menu.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<style>
    #header {
        position: relative;
    }

    #article {
        margin-top: 0;
    }

    #footer {
        margin-top: 0;
    }

    .content-header .menu ul li:nth-child(2) a{
        border: 2px solid #f4d2d6;
        border-bottom: none;
        background-color: #f4d2d6;
        color: var(--bgr-red);
    }
</style>
<style>
    .checkbox-wrapper-7 .tgl {
        display: none;
    }
    .checkbox-wrapper-7 .tgl,
    .checkbox-wrapper-7 .tgl:after,
    .checkbox-wrapper-7 .tgl:before,
    .checkbox-wrapper-7 .tgl *,
    .checkbox-wrapper-7 .tgl *:after,
    .checkbox-wrapper-7 .tgl *:before,
    .checkbox-wrapper-7 .tgl + .tgl-btn {
        box-sizing: border-box;
    }
    .checkbox-wrapper-7 .tgl::-moz-selection,
    .checkbox-wrapper-7 .tgl:after::-moz-selection,
    .checkbox-wrapper-7 .tgl:before::-moz-selection,
    .checkbox-wrapper-7 .tgl *::-moz-selection,
    .checkbox-wrapper-7 .tgl *:after::-moz-selection,
    .checkbox-wrapper-7 .tgl *:before::-moz-selection,
    .checkbox-wrapper-7 .tgl + .tgl-btn::-moz-selection,
    .checkbox-wrapper-7 .tgl::selection,
    .checkbox-wrapper-7 .tgl:after::selection,
    .checkbox-wrapper-7 .tgl:before::selection,
    .checkbox-wrapper-7 .tgl *::selection,
    .checkbox-wrapper-7 .tgl *:after::selection,
    .checkbox-wrapper-7 .tgl *:before::selection,
    .checkbox-wrapper-7 .tgl + .tgl-btn::selection {
        background: none;
    }
    .checkbox-wrapper-7 .tgl + .tgl-btn {
        outline: 0;
        display: block;
        width: 4em;
        height: 2em;
        position: relative;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
    }
    .checkbox-wrapper-7 .tgl + .tgl-btn:after,
    .checkbox-wrapper-7 .tgl + .tgl-btn:before {
        position: relative;
        display: block;
        content: "";
        width: 50%;
        height: 100%;
    }
    .checkbox-wrapper-7 .tgl + .tgl-btn:after {
        left: 0;
    }
    .checkbox-wrapper-7 .tgl + .tgl-btn:before {
        display: none;
    }
    .checkbox-wrapper-7 .tgl:checked + .tgl-btn:after {
        left: 50%;
    }

    .checkbox-wrapper-7 .tgl-ios + .tgl-btn {
        background: #fbfbfb;
        border-radius: 2em;
        padding: 2px;
        transition: all 0.4s ease;
        border: 1px solid #e8eae9;
    }
    .checkbox-wrapper-7 .tgl-ios + .tgl-btn:after {
        border-radius: 2em;
        background: #fbfbfb;
        transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), padding 0.3s ease, margin 0.3s ease;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 4px 0 rgba(0, 0, 0, 0.08);
    }
    .checkbox-wrapper-7 .tgl-ios + .tgl-btn:hover:after {
        will-change: padding;
    }
    .checkbox-wrapper-7 .tgl-ios + .tgl-btn:active {
        box-shadow: inset 0 0 0 2em #e8eae9;
    }
    .checkbox-wrapper-7 .tgl-ios + .tgl-btn:active:after {
        padding-right: 0.8em;
    }
    .checkbox-wrapper-7 .tgl-ios:checked + .tgl-btn {
        background: #86d993;
    }
    .checkbox-wrapper-7 .tgl-ios:checked + .tgl-btn:active {
        box-shadow: none;
    }
    .checkbox-wrapper-7 .tgl-ios:checked + .tgl-btn:active:after {
        margin-left: -0.8em;
    }
</style>
<div id="article">
    <div class="MenuFixed">
        <div class="menuFixed-list-item">
            <?php 
            foreach ($loadCategory as $category) {
                extract($category);
                $Menu = "index.php?act=menu&iddm=".$id;
                $img = $img_path.$imgCT;
                echo '<div class="menuFixed-item">
                        <a href="'.$Menu.'">
                            <div class="menuFixed-img">
                                <img src="'.$img.'" alt="">
                            </div>
                            <div class="menuFixed-content">
                                <h1>'.$nameCategory.'</h1>
                            </div>
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>
    <div class="mainContent">
        <div class="item-products">
            <?php
                foreach ($productCombo as $combo) {                    
                    extract($combo);
                    $img = $img_path.$img;
                    $addCart = "index.php?act=addCart&id=".$id;
                    if($saleProduct > 0) {
                        echo '<div class="item-product">
                                <style>
                                    .priceDot {
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        flex-direction:column;
                                    }

                                    .priceDot .noSalePrice ,
                                    .priceDot .noSalePrice {
                                        color: gray;
                                        text-decoration: line-through;
                                    }

                                    .priceDot div:last-child {
                                        margin-top: 20px;
                                    }
                                </style>
                                <div class="sale">
                                    <span>Sale: '.$saleProduct.'%</span>
                                </div>
                                <div class="img-product">
                                    <img src="'.$img.'" alt="">
                                </div>
                                <div class="info-product">
                                    <div class="name-product">
                                        '.$namePD.'
                                    </div>
                                    <div class="price-product priceDot">
                                        <div><span class="noSalePrice" style="font-size:13px">'.$pricePD.'</span></div>
                                        <div><span class="salePrice">'.$priceSale.'</span></div>
                                    </div>
                                    <div class="btn-product-item">
                                        <a href="'.$addCart.'">ĐẶT HÀNG</a>
                                    </div>
                                </div>
                            </div>';
                    } else {
                        echo '<div class="item-product">
                                <div class="img-product">
                                    <img src="'.$img.'" alt="">
                                </div>
                                <div class="info-product">
                                    <div class="name-product">
                                        '.$namePD.'
                                    </div>
                                    <div class="price-product priceDot">
                                        <div><span>'.$pricePD.'</span></div>
                                    </div>
                                    <div class="btn-product-item">
                                        <a href="'.$addCart.'">ĐẶT HÀNG</a>
                                    </div>
                                </div>
                            </div>';
                    }
                }
            ?>
        </div>

    </div>
    <div class="cartWidth">
        <div class="cartOpen">
            <?php 
                if (isset($_SESSION['user'])) {

                    $iduser = $_SESSION['user']['id'];
                    $list_Cart = load_Cart ($iduser);
                    $totalCart = 0;
                    foreach ($list_Cart as $cart) {
                        extract($cart);
                        $id = $idProduct;
                        $product = loadOne_product ($id);
                        extract($product);
                        $newPrice = 0;
                        if($saleProduct > 0 ) {
                            $newPrice = $priceSale;
                            $totalProduct = $newPrice * $quantity;
                            $totalCart += $totalProduct;
                        } else {
                            $newPrice = $pricePD;
                            $totalProduct = $newPrice * $quantity;
                            $totalCart += $totalProduct;
                        }
                    }
                }
            ?>
            <i class="fa-solid fa-cart-shopping"></i> 
            <div class="priceDot">
                <?php
                    if(isset($totalCart)) {
                        echo '<span class="priceDot updatePrice">'.$totalCart.'</span>'; 
                    }else {
                        echo '<span class="priceDot updatePrice">0₫</span>'; 
                    }
                ?>
                
            </div> 
        </div>
        <div class="cartContainer">
            <form action="index.php?act=payMent" method="post">
                <div class="cart-relative">
                    <div class="close-icon-absolute">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="cart-box">
                        <div class="cart-items">
                            <?php
                                if (isset($_SESSION['user'])) {

                                    $iduser = $_SESSION['user']['id'];
                                    $list_Cart = load_Cart ($iduser);
                                    $totalCart = 0;
                                    foreach ($list_Cart as $cart) {
                                        extract($cart);
                                        $remove = "index.php?act=removeCart&id=".$id;
                                        $id = $idProduct;
                                        $product = loadOne_product ($id);
                                        extract($product);
                                        $img = $img_path.$img;
                    

                                        $newPrice = 0;
                                        if(isset($cart)) {
                                            if($saleProduct > 0 ) {
                                                $newPrice = $priceSale;
                                                $totalProduct = $newPrice * $quantity;
                                                $totalCart += $totalProduct;
                                            } else {
                                                $newPrice = $pricePD;
                                                $totalProduct = $newPrice * $quantity;
                                                $totalCart += $totalProduct;
                                            }
                                            echo '
                                            <div class="cart-item">
                                                <div class="product-info">
                                                    <img src="'.$img.'" alt="">
                                                    <h2>'.$namePD.'</h2>
                                                </div>
                                                <div class="close-icon">
                                                    <a href="'.$remove.'"><i class="fa-solid fa-xmark"></i></a>
                                                </div>
                                                <div class="product-content">
                                                <div class="quantity">
                                                        <input class="minus" type="button" value="-">
                                                        <input class="total" type="text" value="'.$quantity.'" name="quantity[]">
                                                        <input class="plus" type="button" value="+">
                                                </div>
                                                    <div class="content-item priceDot">
                                                        <span>'.$newPrice.'</span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="img[]" value="'.$img.'">
                                                <input type="hidden" name="namePD[]" value="'.$namePD.'">
                                                <input type="hidden" name="pricePD[]" value="'.$pricePD.'">
                                            </div>
                                            ';
                                        }
                                        
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="div-clone" style="height:120px;width: 100%;"></div>
                    <?php 
                        if(isset($_SESSION['user'])) {
                            if(isset($cart)) {
                                echo '<div class="btn-pay">
                                        <div class="checkBox-container">
                                            <div class="checkbox-wrapper-7">
                                                <input class="tgl tgl-ios" id="cb2-7" type="checkbox"/ value="0">
                                                <label class="tgl-btn" for="cb2-7">
                                            </div>
                                            <div class="checkbox-text">
                                                <h2>Lấy dụng cụ ăn uống nhựa</h2>
                                                Chúng tôi sẽ gửi dụng cụ ăn uống nhựa như: muỗng, nĩa...
                                            </div>
                                        </div>
                    
                                        <div class="btn-payAction priceDot">
                                                <h1>Tổng cộng: <span> '.$totalCart.'</span> </h1>
                                                <button name="btn-pay">Thanh toán</button>
                                        </div>
                                    </div>';
                            } else {
                                echo "<strong>Không có đơn hàng nào cả.</strong>";

                            }
                        }else {
                            echo "<strong>Không có đơn hàng nào cả.</strong>";

                        }
                    ?>
                </div>
                <input type="hidden" name="totalPrice" value="<?=$totalCart?>">
            </form>          
        </div>
        <div class="cart-follower">
            <a href="index.php?act=cartFollow">
                <span class="material-symbols-outlined">
                    local_mall
                </span>
                <h1>Theo dõi đơn hàng</h1>
            </a>
        </div>
    </div>
</div>
<script src="view/js/price.js"></script>
<script src="view/js/thucdon.js"></script>
