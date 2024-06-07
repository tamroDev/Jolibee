<?php 
    session_start();
    ob_start();
    include("view/header.php");
    include "model/cart.php";
    include "model/oder.php";
    include "model/product.php";
    include "model/category.php";
    include "model/user.php";
    include "model/chart.php";
    include "model/feedback.php";
    include "global.php";
    include "model/pdo.php";

    if(isset($_GET['act'])){
        $act = $_GET['act'];

        switch ($act) {
            //------------------------------------------------------
            // THỰC ĐƠNNNNNNN
            //------------------------------------------------------
            case 'viewMenu':
                $productCombo = loadAll_combo();
                $loadCategory = loadAll_category();
                include('view/thucdon.php');
                break;
            case 'menu':
                if(isset($_GET['iddm'])){
                    $id = $_GET['iddm'];
                    $productCombo = loadAll_menu ($id);
                }
                $loadCategory = loadAll_category();
                include('view/thucdon.php');
                break;
            //------------------------------------------------------
            // THỰC ĐƠNNNNNNN
            //------------------------------------------------------

            //------------------------------------------------------
            // LOGIN
            //------------------------------------------------------
            case 'register':
                include "view/register.php";
                break;

            case 'addUser':
                if(isset($_POST['btn-register'])) {
                    $email = $_POST['email'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $adr = $_POST['adr'];
                    $password = $_POST['password'];

                    $check = check ($email);
                    if($check === false) {
                        insert_taikhoan($email,$firstName,$lastName,$phoneNumber,$adr,$password);
                        $thongbao = "Đăng ký thành công";
                        include "view/register.php";
                    }else {
                        $thongbao = "Email đã tồn tại. Vui Lòng chọn Email khác.";
                        include "view/register.php";

                    }
                }
                // header("Location: index.php");
                break;

            case "login":
                if (isset($_POST['btn-login'])) {
                    $user = $_POST['email'];
                    $pass = $_POST['password'];
                    $checkuser = checkuser($user, $pass);
                    $check = 0;
            
                    if (is_array($checkuser)) {
                        // Kiểm tra trạng thái tài khoản
                        if ($checkuser['status'] == "VoHieuHoa") {
                            $thongbao = '<h3 class="thongBao">Tài khoản của bạn đã bị <strong>vô hiệu hóa</strong>. Vui lòng liên hệ với quản trị viên.</h3>';
                            include "view/register.php";
                        } else {
                            // Tài khoản hợp lệ, đăng nhập
                            $_SESSION['user'] = $checkuser;
                            $_SESSION['check'] = 1;
                            header('location: index.php');
                            $check = 1;
                        }
                    } else {
                        // Người dùng không tồn tại
                        $thongbao = '<h3 class="thongBao">Tài khoản <strong>không tồn tại</strong></h3>';
                        include "view/register.php";
                        $check = 0;
                    }
                }
                break;

            case "serviceUser":
                include "view/serviceUser.php";
                break;

            case "updateUser":
                include "view/updateAccount.php";
                break;

            case "updateAccount":
                if(isset($_POST['btn-update'])) {
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $adr = $_POST['adr'];
                    $id = $_SESSION['user']['id'];
                    
                    $imgProduct = $_FILES['upload']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
                    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {}
                    update_taikhoan($id,$firstName,$lastName,$phoneNumber,$adr,$imgProduct);

                    $_SESSION['user']['firstName'] = $_POST['firstName'];
                    $_SESSION['user']['lastName'] = $_POST['lastName'];
                    $_SESSION['user']['phoneNumber'] = $_POST['phoneNumber'];
                    $_SESSION['user']['adr'] = $_POST['adr'];
                    if($imgProduct !== '') {
                        $_SESSION['user']['imgUser'] = $img = $_FILES['upload']['name'];
                    }
                    $notification = "<h1 class='notification'>Update thành công.</h1>";
                }
                header ("location: index.php?act=updateUser");
                break;
            
            case  "logAdmin":
                header ("Location: admin/index.php?act=category");
                break;

            case 'updatePassword':
                include 'view/updatePass.php';
                break;
            
            case 'updatePass':
                    if(isset($_POST['btn-update'])) {
                        $thongbao = '';
                        $id = $_SESSION['user']['id'];
                        $user = loadOne_User ($id);
                        extract($user);
                        
                        $OldPass = $user['password'];
                        $OldPass2 = $_POST['oldPass'];
                        $newPass = $_POST['newPass'];
                        $confirmPass = $_POST['confirmPass'];
                        
                        if ($OldPass === $OldPass2) {
                            if($newPass === $confirmPass) {
                                updatePassword ($confirmPass,$id);
                                $thongBao = 'Đổi mật khẩu thành công';
                                include 'view/updatePass.php';
                            } else {
                                $thongBao = 'Mật khẩu xác nhận sai';
                                include 'view/updatePass.php';
                            }
                        } else {
                            $thongBao = 'Mật khẩu cũ không chính xác';
                            include 'view/updatePass.php';
                        }
                        
                    }
                break;

            case "logOut":
                session_unset();
                header  ("Location: index.php");
                break;

            //------------------------------------------------------
            // LOGIN
            //------------------------------------------------------

            //------------------------------------------------------
            // CART
            //------------------------------------------------------
            
            case "addCart":
                $id = $_GET['id'];
                $cartProduct = loadOne_product ($id);   
                $cartProduct = loadOne_product ($id);   
                include 'view/cart.php';
                break;

            case "inrsetCart":
                if(isset($_SESSION['user'])) {
                    if(isset($_POST['btn-cart'])){
                        $idProduct = $_POST['idProduct'];
                        $iduser = $_POST['iduser'];
                        $quantity = $_POST['quantity'];
                        
                        insert_cart ($quantity,$idProduct,$iduser);
                    }
                    header("Location: index.php?act=viewMenu");
                }else {
                    $thongbao = '<h3 class="thongBao">Đăng nhập để sử dụng chức năng giỏ hàng.</strong></h3>';
                    include "view/register.php";
                }
                break;

            case "removeCart":
                $id = $_GET['id'];
                remove_cart ($id);
                header("Location: index.php?act=viewMenu");
                break;

            //STEP 1
            
            case "payMent":
                header("location: index.php?act=ViewpayMent");
                break;

            case "ViewpayMent":
                include 'view/payment/payment.php';
                break;
            
            case "updateAccount2":
                if(isset($_POST['btn-update'])) {
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $adr = $_POST['adr'];
                    $password = $_POST['password'];
                    $id = $_SESSION['user']['id'];

                    $_SESSION['user']['firstName'] = $_POST['firstName'];
                    $_SESSION['user']['lastName'] = $_POST['lastName'];
                    $_SESSION['user']['phoneNumber'] = $_POST['phoneNumber'];
                    $_SESSION['user']['adr'] = $_POST['adr'];


                    update_taikhoan2($id,$firstName,$lastName,$phoneNumber,$adr);
                    $notification = "<h1 class='notification'>Update thành công.</h1>";
                }
                header("location: index.php?act=ViewpayMent");
                break;

            //STEP 2
            case "payMent2":
                header("location: index.php?act=ViewpayMent2");
                break;

            case "ViewpayMent2":

                include 'view/payment/payment2.php';
                break;

            case "removeCart2":
                $id = $_GET['id'];
                remove_cart ($id);
                header("Location: index.php?act=payMent2");
                break;
            
            case "addToOrder":
                if (isset($_POST['btn-pay'])) {
                        $thongbao = "";
                        $payMethod = "";
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $currentDateTimeVN = date('Y-m-d H:i:s');
                        $totalPrice = $_POST['totalPrice'];
                        if(isset($_POST['thanhtoankhinhan'])) {
                            $payMethod = $_POST['thanhtoankhinhan'];
                        } else if(isset($_POST['banking'])) {
                            $payMethod = $_POST['banking'];
                        } else {
                            $thongbao = "Vui lòng chọn phương thức thanh toán.";
                            include ("view/payment/payment2.php");
                            exit;
                        }
                        

                        $iduser = $_SESSION['user']['id'];
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "jolibee";
                
                        $conn = new mysqli($servername, $username, $password, $dbname);
                
                        if ($conn->connect_error) {
                            die("Kết nối không thành công: " . $conn->connect_error);
                        }
                        $conn->begin_transaction();
                
                        try {
                            $sqlOrder = "INSERT INTO orders (total_amount, order_date, payMethod, iduser,statusOrder) VALUES ('$totalPrice', '$currentDateTimeVN', '$payMethod', '$iduser',0)";
                
                            if ($conn->query($sqlOrder) !== TRUE) {
                                throw new Exception("Lỗi: " . $sqlOrder . "<br>" . $conn->error);
                            }

                            $lastOrderId = $conn->insert_id;

                            $quantityItem = $_POST['quantity'];
                            $imgItem = $_POST['img'];
                            $nameItem = $_POST['namePD'];
                            $priceItem = $_POST['pricePD'];
                
                            if (!is_array($quantityItem) || !is_array($imgItem) || !is_array($nameItem) || !is_array($priceItem)) {
                                $quantityItem = array($quantityItem);
                                $imgItem = array($imgItem);
                                $nameItem = array($nameItem);
                                $priceItem = array($priceItem);
                            }

                            foreach ($quantityItem as $key => $quantity) {
                                $img = $imgItem[$key];
                                $namePD = $nameItem[$key];
                                $pricePD = $priceItem[$key];

                                $sqlOrderDetails = "INSERT INTO order_details (order_id, quantity, img, product_name, price) VALUES ('$lastOrderId', '$quantity', '$img', '$namePD', '$pricePD')";
                
                                if ($conn->query($sqlOrderDetails) !== TRUE) {
                                    throw new Exception("Lỗi: " . $sqlOrderDetails . "<br>" . $conn->error);
                                }
                            }
                
                            $conn->commit();
                            $idUserD = $_SESSION['user']['id'];
                            delete_cart_user ($idUserD);
                            header ('location: index.php?act=payment3');
                        } catch (Exception $e) {
                            $conn->rollback();
                            echo "Lỗi: " . $e->getMessage();
                        }

                        $conn->close();
                    }
                
                break;
            
            //STEP 3
            case 'payment3':
                include "view/payment/payment3.php";
                
                break;

            //------------------------------------------------------
            // CART
            //------------------------------------------------------


            //------------------------------------------------------
            // CART Follow
            //------------------------------------------------------
            case "cartFollow":
                if($_SESSION['user']['id']) {
                    $id = $_SESSION['user']['id'];
                    $orders = loadAll_orders_user($id);
                    include 'view/cartFollow.php';
                }else {
                    include 'view/home.php';
                }
                break;

            case "order_details":
                $order_id = $_GET['order_id'];
                $details= load_orderDetails($order_id) ;
                include "view/cartDetail.php";
                break;

            case 'order_delete':
                $order_id = $_GET['order_id'];
                delete_order($order_id);
                header ('Location: index.php?act=cartFollow');
                break;

            case "showUser":
                header ("Location: admin/index.php?act=showUser");
                break;
            //------------------------------------------------------
            // CART Follow
            //------------------------------------------------------
            case "discount":
                include "view/khuyenmai.php";
                break;

            case 'about':
                include "view/about.php";
                break;

            case 'service':
                include "view/service.php";
                break;

            case "lienhe":
                include "view/lienhe.php";
                break;
            
            case "feedback":
                $thongbao = "";
                if(isset($_SESSION['user'])) {
                    if(isset($_POST['btn-submit'])) {
                        $name = $_POST['fname'];
                        $title = $_POST['ftitle'];
                        $fcontent = $_POST['fcontent'];
                        $iduser = $_POST['fid'];
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $currentDateTimeVN = date('Y-m-d H:i:s');

                        submit_feddback ($iduser,$name,$title,$fcontent,$currentDateTimeVN);
                        $thongbao = "Gửi yêu cầu thành công. <a stytle ='color:red' href='index.php?act=feedbackFollow'>Theo dõi phản hồi tại đây.</a>";
                    } else {
                        $thongbao = "Gửi yêu cầu không thành công";
                    }
                }else {
                    $thongbao = "Bạn phải đăng nhập để gửi yêu cầu";
                }
                include "view/lienhe.php";
                break;

            case "feedbackFollow":
                if (isset($_SESSION['user'])){
                    $iduser = $_SESSION['user']['id'];
                    $listFeedback = load_feedback ($iduser);
                }
                include "view/feedbackFollow.php";
                break;

            case 'detailsFeedback':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $feedbackItem = loadOne_feedback ($_GET['id']);
                }
                include "view/detailsFeedback.php";
                break;

            case 'deleteFeedback':
                $id = $_GET['idFB'];
                delete_Status ($id);
                header('Location: index.php?act=feedbackFollow');
                break;
            
            //ADMIN LOGIN
            case 'url-admin':
                header ('location: index.php?act=loginAdmin');
                break;
            case "loginAdmin":
                header ('location: admin/loginAdmin.php');
                break;
                
            default:
                include('view/home.php');
                break;
        }
    }else {
        include("view/home.php");

    }
    include("view/footer.php");
    ob_end_flush();
?>