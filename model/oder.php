<?php 
    function add_order_details($quantity, $img, $namePD, $pricePD) {
        $sql = "INSERT INTO order_details(quantity, price, product_name, img) VALUES ('$quantity', '$pricePD', '$namePD', '$img') ";
        pdo_execute($sql);
    }

    function add_order ( $totalPrice, $currentDateTimeVN, $payMethod, $iduser) {
        $sql = "INSERT INTO orders (total_amount,order_date,payMethod,iduser) VALUES 
        ( '$totalPrice', '$currentDateTimeVN', '$payMethod', '$iduser')";
        pdo_execute($sql);

    }

    function delete_cart_user ($idUserD) {
        $sql = "DELETE FROM carts WHERE iduser =" .$idUserD;
        pdo_execute($sql);
    }

    function loadAll_orders() {
        $sql = "SELECT * FROM orders order by id ASC";
        $listOD = pdo_query($sql);
        return $listOD;
    }

    function loadAll_orders_user($id) {
        $sql = "SELECT * FROM orders WHERE iduser=".$id ." ORDER BY id DESC";
        $listOD = pdo_query($sql);
        return $listOD;
    }
    

    
    function load_orderDetails($order_id) {
        $sql = "SELECT * FROM order_details where order_id =" .$order_id;
        $details = pdo_query($sql);
        return $details;
    }

    function delete_order($order_id) {
        $sql = "DELETE FROM order_details WHERE order_id=" .$order_id;
        pdo_execute($sql);
        
        $sql = "DELETE FROM orders WHERE id=" .$order_id;
        pdo_execute($sql);

    }
    
?>