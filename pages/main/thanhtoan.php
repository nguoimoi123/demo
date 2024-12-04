<?php
    session_start();
    include('../../admincp/connet/connet.php');
    require('../../carbon/autoload.php');
    require_once('connet_vnpay.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now= Carbon::now('Asia/Ho_Chi_Minh');
    $id_khachhang=$_SESSION['id_user'];
    $ma_oder=rand(0,9999);
    $cart_payment=$_POST['payment'];

    $id_dangky = $_SESSION['id_user'];
    $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
    $id_shipping=$row_get_vanchuyen['id_shipping'];
    $insert_cart="INSERT INTO tbl_cart(id_khachhang,ma_cart,trangthai,cart_date,cart_payment,cart_shipping) VALUES('".$id_khachhang."','".$ma_oder."',0,'".$now."','".$cart_payment."','".$id_shipping."')";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        foreach($_SESSION['cart'] as $key=>$value){
            $id_sanpham=$value['id'];
            $soluong=$value['soluong'];
            $insert_oder_detail="INSERT INTO tbl_cart_detail(id_sanpham,ma_cart,soluongmua) VALUES('".$id_sanpham."','".$ma_oder."','".$soluong."')";
            mysqli_query($mysqli,$insert_oder_detail);
            $update_stock = "UPDATE tbl_sanpham SET soluong = soluong - '".$soluong."' WHERE id_sanpham = '".$id_sanpham."'";
            mysqli_query($mysqli, $update_stock);
        }
    }
    unset($_SESSION['cart']);
    header('Location:../indexpage.php?quanly=camon');
?>