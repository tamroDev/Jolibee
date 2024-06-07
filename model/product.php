<?php 
    function insert_product($nameProduct,$priceProduct,$saleProduct,$priceSale,$imgProduct,$iddm) {
        $sql = "INSERT INTO products(namePD,pricePD,saleProduct,priceSale,img,iddm) VALUES ('$nameProduct','$priceProduct','$saleProduct','$priceSale','$imgProduct','$iddm')";
        pdo_execute($sql);
    }

    function loadAll_product($kyw = "",$iddm = 0) {
        $sql = "select * from products where 1";
        if ($kyw != "") {
            $sql .= " and namePD like '%" . $kyw . "%'";
        }
        if ($iddm > 0) {
            $sql .= " and iddm like '%" . $iddm . "%'";
        }
        $sql .= " order by id desc";
        $listproduct = pdo_query($sql);
        return $listproduct;
    }

    function loadOne_product ($id) {
        $sql = "select * from products where id=".$id;
        $onePD = pdo_query_one($sql);
        return $onePD; 
    }

    function  update_product($id, $iddm, $namePD, $pricePD, $saleProduct,$priceSale,$img)
    {
       if ($img != "")
          $sql = "update products set iddm='" . $iddm . "',namePD='" . $namePD . "',pricePD='" . $pricePD . "',saleProduct='" . $saleProduct . "',priceSale='" . $priceSale . "',img='" . $img . "' where id=" . $id;
       else
          $sql = "update products set iddm='" . $iddm . "',namePD='" . $namePD . "',pricePD='" . $pricePD . "',saleProduct='" . $saleProduct . "',priceSale='" . $priceSale . "' where id=" . $id;
       // print_r($sql);
       pdo_execute($sql);
    }

    function delete_product($id) {
        $sql = "delete from products where id=".$_GET['id'];
        pdo_execute($sql);
    }

    function loadAll_menu ($id) {
        $sql = 'select * from products where iddm =' .$id;
        $productCombo = pdo_query($sql);
        return $productCombo;
    }

    function loadAll_combo () {
        $sql = 'select * from products where iddm = 24';
        $productCombo = pdo_query($sql);
        return $productCombo;
    }




?>