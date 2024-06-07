<?php 
    function insert_taikhoan($email,$firstName,$lastName,$phoneNumber,$adr,$password){
        $sql="insert into users(email,firstName,lastName,phoneNumber,adr,password,status,role) 
        values('$email','$firstName','$lastName','$phoneNumber','$adr','$password','HoatDong','KhachHang')";
        pdo_execute($sql);
    }

    function check ($email) {
        $sql = "SELECT * FROM users where email = '$email'";
        $sp=pdo_query_one($sql);
        return $sp;

    }

    function checkUser($email,$password){
        $sql="SELECT * FROM users where email='".$email."' AND password='".$password."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function loadAll_User () {
        $sql = "SELECT * FROM users ";
        $listUser = pdo_query($sql);
        return $listUser;
    }

    function load_user () {
        $sql = "SELECT * FROM users";
        $listUser = pdo_query($sql);
        return $listUser;
    }

    function loadOne_User ($id) {
        $sql = "SELECT * FROM users where id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;

    }

    function  update_taikhoan($id,$firstName,$lastName,$phoneNumber,$adr,$img) {
        if ($img == "" ) {
            $sql="update users set firstName='".$firstName."',lastName='".$lastName."',phoneNumber='".$phoneNumber."',adr='".$adr."' where id=".$id;
        } else {
            $sql = "update users set firstName='".$firstName."', lastName='".$lastName."',  phoneNumber='".$phoneNumber."', adr='".$adr."', imgUser='".$img."' where id=".$id;

        }
        pdo_execute($sql);
    }

    function updatePassword ($pass,$id) {
        $sql = "UPDATE users set password='".$pass."' where id=" .$id;
        pdo_execute($sql);
    }

    function  update_taikhoan2($id,$firstName,$lastName,$phoneNumber,$adr) {
        $sql="update users set firstName='".$firstName."',lastName='".$lastName."',phoneNumber='".$phoneNumber."',adr='".$adr."' where id=".$id;
        pdo_execute($sql);
    }

    function delete_User ($id) {
        $sql= "DELETE FROM carts where iduser=" .$id;
        pdo_execute($sql);

        $sql= "DELETE FROM users where id=" .$id;
        pdo_execute($sql);
    }
?>