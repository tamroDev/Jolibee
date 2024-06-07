<?php
    function count_products() {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT COUNT(*) AS tongsp FROM products";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['tongsp'];
    }

    function sum_products() {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT SUM(pricePD) AS total_price
        FROM products";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result;
    }

    function count_User() {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT COUNT(*) AS user FROM users where role = 'NhanVien'";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['user'];
    }

    function count_order() {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT COUNT(*) AS orders FROM orders";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['orders'];
    }

    function sum_order() {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT SUM(total_amount) AS total
        FROM orders";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['total'];
    }

    function sum_Danhthu () {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT SUM(total_amount) AS total
        FROM orders where statusOrder = 2";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['total'];
    }

    function sum_product($id) {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT SUM(pricePD) AS total
        FROM products where iddm=" .$id;
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['total'];
    }
    function count_chartProduct($id) {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");
    
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT COUNT(*) AS products FROM products where iddm=" .$id;
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['products'];
    }

    function select_user () {
        $sql = "SELECT  * FROM users where role = 'NhanVien' ";
        $listUS = pdo_query($sql);
        return $listUS;
    }

    function select_product_CT ($iddm) {
        $sql = "SELECT  * FROM products where iddm = ".$iddm;
        $listUS = pdo_query($sql);
        return $listUS;
    }

    function select_HT () {
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");

        $sql = "SELECT  COUNT(*) AS HT FROM orders where statusOrder = 2 ";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['HT'];
    }

    function count_feedback () {
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");

        $sql = "SELECT  COUNT(*) AS FB FROM feedback";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['FB'];
    }

    function count_StatusFeedback () {
        $pdo = new PDO("mysql:host=localhost;dbname=jolibee", "root", "");

        $sql = "SELECT  COUNT(*) AS FB FROM feedback where feedbackStatus = 0";
        $stmt = $pdo->prepare($sql);
    
        // Thực hiện truy vấn
        $stmt->execute();
    
        // Lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Đóng kết nối đến cơ sở dữ liệu
        $pdo = null;
    
        return $result['FB'];
    }

    
?>