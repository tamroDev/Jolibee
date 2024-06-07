<?php
ob_start();
include "../global.php";
include "../model/pdo.php";
include "../model/category.php";
include "../model/product.php";
include "../model/user.php";
include "../model/oder.php";
include "../model/chart.php";
include "../model/feedback.php";
include "left.php";

session_start(); // Bắt đầu session

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    if ($act === 'adminConfirm') {
        if (isset($_POST['submit'])) {
            $user = $_POST['email'];
            $pass = $_POST['password'];
            $checkuser = checkuser($user, $pass);

            if (is_array($checkuser)) {
                // Kiểm tra trạng thái tài khoản
                if ($checkuser['role'] == "Admin" || $checkuser['role'] == 'NhanVien') {
                    $_SESSION['checkuser'] = $checkuser; // Lưu thông tin user vào session
                    $products = count_products();
                    $sumProduct = sum_products();
                    $sumPrice = $sumProduct['total_price'] / $products;
                    $roundedSumPrice = round($sumPrice, 0);
                    $user = count_User();
                    $orders = count_order();
                    $totalOrder = sum_order();
                    $totalDanhthu = sum_Danhthu ();
                    $totalHT = select_HT () ;
                    $countFB = count_feedback ();
                    $countRep = count_StatusFeedback ();
                    include 'chart/list.php';
                } else {
                    $thongbao = "Sai mật khẩu hoặc tài khoản không được cấp quyền truy cập";
                    include 'loginAdmin.php';
                }
            } else {
                $thongbao = "Sai mật khẩu hoặc tài khoản không được cấp quyền truy cập";
                include 'loginAdmin.php';
            }
        } else {
            header("Location: ../index.php?act=loginAdmin");
            exit(); 
        }
    } else {
        if (!isset($_SESSION['checkuser'])) {
            header("Location: ../index.php?act=loginAdmin");
            exit(); 
        }
    
        switch ($act) {
            case 'category':
                $listCT = loadAll_category();
                include 'category/list.php';
                break;

            case 'addCategory':
                include 'category/add.php';
                break;
            case 'addCT':
                if (isset($_POST['btn-add'])) {
                    $nameCategory = $_POST['nameCategory'];
                    $imgCT = $_FILES['imgCT']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["imgCT"]["name"]);
                    if (move_uploaded_file($_FILES["imgCT"]["tmp_name"], $target_file)) {
                        addCategory($nameCategory, $imgCT);
                    }
                }
                header('location: index.php?act=addCategory');
                break;
            case 'deleteCategory':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delete_category($id);
                }
                header('location: index.php?act=category');
                break;
            case 'updateCategory':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $updateCT = loadOne_danhmuc($id);
                }
                include "category/update.php";
                break;
            case 'updateCT':
                if (isset($_POST['btn-update'])) {
                    $nameCT = $_POST['nameCT'];
                    $id = $_POST['id'];
                    $img = $_FILES['img']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        update_Category($id, $nameCT, $img);
                    }
                }
                header("Location: index.php?act=category");
                break;

            case 'products':
                if(isset($_POST['listok']) && ($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }else {
                    $kyw = "";
                    $iddm = 0;
                }
                $listcategory = loadAll_category();
                $listproduct = loadAll_product($kyw,$iddm);
                include 'product/list.php';
                break;

            case 'addProduct':
                if(isset($_POST['btn-addPD'])) {
                    $nameProduct = $_POST['nameProduct'];
                    $priceProduct = $_POST['priceProduct'];
                    $saleProduct = $_POST['saleProduct'];
                    $priceSale = $priceProduct - ($priceProduct * $saleProduct/100);
                    $iddm = $_POST['iddm'];
                    $imgProduct = $_FILES['imgProduct']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["imgProduct"]["name"]);
                    if (move_uploaded_file($_FILES["imgProduct"]["tmp_name"], $target_file)) {}
                    insert_product($nameProduct,$priceProduct,$saleProduct,$priceSale,$imgProduct,$iddm);
                    header ("location: index.php?act=addProduct");
                }
                $listcategory = loadAll_category();
                include "product/add.php";
                break;

            case "updateProduct":
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $product = loadOne_product($_GET['id']);
                }
                $listcategory = loadAll_category();
                include "product/update.php";
                break;
            case "updatePD":
                if(isset($_POST['btn-update'])){
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $namePD = $_POST['nameProduct'];
                    $pricePD = $_POST['priceProduct'];
                    $saleProduct = $_POST['saleProduct'];
                    $priceSale = $pricePD - ($pricePD * $saleProduct/100);
                    $img = $_FILES['img']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }

                    update_product($id, $iddm, $namePD, $pricePD, $saleProduct,$priceSale, $img);
                }
                $listcategory = loadAll_category();
                $listproduct = loadAll_product();
                header ("location: index.php?act=products");
                break;
            case "deletePD":
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_product($_GET['id']);
                }
                header ("location: index.php?act=products");
                break;

            // User
            case 'showUser':
                $userList = load_user() ;
                include "user/list.php";
                break;
            
            case "xoaUser":
                if (isset($_GET["id"])) { 
                    $id = $_GET['id'];
                    delete_User ($id);
                }
                $userList = loadAll_User ();
                include "user/list.php";
                break;

            case "showOrder":
                $orders = loadAll_orders() ;
                include "order/list.php";
                break;

            case "order_details":
                $order_id = $_GET['order_id'];
                $details= load_orderDetails($order_id) ;
                include "order/details.php";
                break;

            case "order_delete":
                $order_id = $_GET['id'];
                delete_order($order_id);
                $orders = loadAll_orders();
                include "order/list.php";
                break;

            case "showChart":
                $products = count_products();
                $sumProduct = sum_products();
                $sumPrice = $sumProduct['total_price'] / $products;
                $roundedSumPrice = round($sumPrice, 0);
                $user = count_User();
                $orders = count_order();
                $totalOrder = sum_order();
                $totalDanhthu = sum_Danhthu ();
                $totalHT = select_HT () ;
                $countFB = count_feedback ();
                $countRep = count_StatusFeedback ();
                include "chart/list.php";
                break;

            case "chartProduct":
                $listCT = loadAll_category();
                include "chart/chartProduct.php";
                break;

            case "chartUser":
                include "chart/chartUser.php";
                break;

            case "chartorder":
                $orders = loadAll_orders() ;
                include "chart/chartOrder.php";
                break;

            case "showFeedback":
                $feedbacks = loadAll_feedback ();
                include "feedback/list.php";
                break;

            case 'repFeedback':
                if(isset($_GET['idFB'])&&($_GET['idFB']>0)){
                    $feedbackItem = loadOne_feedback ($_GET['idFB']);
                }
                include "feedback/repFeedback.php";
                break;

            case 'rep':
                if (isset($_POST['submit-rep'])) {
                    $content = $_POST['content'];
                    $idFeedback = $_POST['idFeedback'];

                    rep ($idFeedback,$content);
                    setStatus ($idFeedback);
                }
                header ('Location: index.php?act=showFeedback');
                break;

            case 'deleteFeedback':
                $id = $_GET['idFB'];
                delete_Status ($id);
                $feedbacks = loadAll_feedback ();
                include "feedback/list.php";
                break;

            case "login-admin":
                header ("Location: index.php?act=adminConfirm");
                break;

            case "backHome":
                unset($_SESSION['checkuser']);
                header("Location: ../index.php");
                break;
            default:
                header("Location: ../index.php");
                break;
        }
    }
} else {
    header("Location: ../index.php");
}
ob_end_flush();
?>