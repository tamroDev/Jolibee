<?php 
    // function insert_cart ($quantity,$idProduct,$iduser) {
    //     $sql = "INSERT INTO carts (quantity,idProduct,iduser)
    //     VALUES('$quantity','$idProduct','$iduser')";
    //     pdo_execute($sql);
    // }

    // function load_Cart ($iduser) {
    //     $sql = "SELECT FROM carts where iduser=" .$iduser;
    //     $listCart = pdo_query($sql);
    //     return $listCart;
    // }
    function insert_cart($quantity, $idProduct, $iduser) {
        $pdo = new PDO('mysql:host=localhost;dbname=jolibee', 'root', '');
    
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của người dùng chưa
        // CRUD :  Create, READ , Update , Delete
        $sqlCheck = "SELECT * FROM carts WHERE idProduct = :idProduct AND iduser = :iduser";
        $stmtCheck = $pdo->prepare($sqlCheck);
        $stmtCheck->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
        $stmtCheck->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $stmtCheck->execute();
    
        $existingCartItem = $stmtCheck->fetch(PDO::FETCH_ASSOC);
    
        if ($existingCartItem) {
            // Nếu sản phẩm đã tồn tại, chỉ cập nhật số lượng
            $newQuantity = $existingCartItem['quantity'] + $quantity;
    
            $sqlUpdate = "UPDATE carts SET quantity = :quantity WHERE idProduct = :idProduct AND iduser = :iduser";
            $stmtUpdate = $pdo->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':iduser', $iduser, PDO::PARAM_INT);
            $stmtUpdate->execute();
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $sqlInsert = "INSERT INTO carts (quantity, idProduct, iduser) VALUES (:quantity, :idProduct, :iduser)";
            $stmtInsert = $pdo->prepare($sqlInsert);
            $stmtInsert->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmtInsert->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
            $stmtInsert->bindParam(':iduser', $iduser, PDO::PARAM_INT);
            $stmtInsert->execute();
        }
    }

    function load_Cart($iduser) {
        $pdo = new PDO('mysql:host=localhost;dbname=jolibee', 'root', '');
        $sql = "SELECT * FROM carts WHERE iduser = :iduser";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $stmt->execute();
        $listCart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $listCart;
    }

    function remove_cart ($id) {
        $sql = "DELETE FROM carts WHERE id=".$id;
        pdo_execute($sql);
    }

    function checkProduct_cart($idProduct) {
        $index = -1;
        for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if($_SESSION['cart'][$i][1]==$idProduct) {
                $index = $i; 
            }
        }
        return $index;
    }

    function update_quantity ($indexCart) {
        for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if($i==$indexCart) {
                $_SESSION['cart'][$i][2]+=1;
            }
        }
    }
?>