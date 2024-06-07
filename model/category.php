<?php 
    function addCategory ($nameCategory,$imgCT) {
        $sql = "INSERT INTO category(nameCategory,imgCT) VALUES ('$nameCategory','$imgCT') ";
        pdo_execute($sql);
    }

    function loadAll_category() {
        $sql = "SELECT * FROM category order by id ASC";
        $listCT = pdo_query($sql);
        return $listCT;
    }

    function loadOne_danhmuc ($id) {
        $sql = "select * from category where id=".$id;
        $ctUpdate = pdo_query_one($sql);
        return $ctUpdate; 
    }

    function delete_category($id) {
        $sql = "delete from category where id=".$id;
        pdo_execute($sql);
    }

    function update_Category($id,$nameCT,$img) {
        if($img != "") {
            $sql = "update category set nameCategory='".$nameCT."',imgCT='".$img."' where id=".$id;

        }else {
            $sql = "update category set nameCategory='".$nameCT."' where id=".$id;
        }
        pdo_execute($sql);
    }

    

?>